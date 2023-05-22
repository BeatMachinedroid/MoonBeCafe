<?php

namespace App\Http\Controllers\Web\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);


        if($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $originalName = $image->getClientOriginalName();
            $image->storeAs('public/menu/' , $originalName);
        }

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->category = $request->category;
        $menu->image = $originalName;
        $menu->price = $request->price;
        $menu->status = $request->status;
        $menu->save();

        return redirect()->route('view.menu')->with('message','Data created is successfully');
    }

    public function edit(Request $request)
    {
        $menu = Menu::findOrFail($request->id);
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        if($request->has('image')) {
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric',
                'status' => 'required',
            ]);
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $originalName = $image->getClientOriginalName();
            $image->storeAs('public/menu/' , $originalName);
            $menu->image = $originalName;
            $menu->name = $request->name;
            $menu->category = $request->category;
            $menu->price = $request->price;
            $menu->status = $request->status;
            $menu->save();
        }
            $menu->name = $request->name;
            $menu->category = $request->category;
            $menu->price = $request->price;
            $menu->status = $request->status;
            $menu->save();

        return back()->with('message','updated is successfully');
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail(decrypt($id));
        Storage::disk('local')->delete('public/menu/'.$menu->image);
        $menu->delete();
        return back()->with('message', 'deleted is successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $cate = Category::all();
        if($search){
            $menu = Menu::with('cate')->where('name', 'LIKE',  $search . '%')->orwhere('status', 'LIKE',  $search . '%')->paginate(5);
        }

        return view('layout.menu.menu' , compact('menu','cate'));
    }
}
