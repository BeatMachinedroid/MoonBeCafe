<?php

namespace App\Http\Controllers\Web\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public/category/', $originalName);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->image = $originalName;
        $category->save();

        return back()->with('message', 'Data saved successfully');
    }

    public function edit(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->has('image')) {
            $request->validate([
                'name' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public/category/', $originalName);
            $category->name = $request->name;
            $category->image = $originalName;
            $category->save();
        }
            $category->name = $request->name;
            $category->save();

        return back()->with('message', 'Data saved successfully');
    }

    public function delete($id)
    {
        $category = Category::find(decrypt($id));
        Storage::disk('local')->delete('public/category/' . $category['image']);
        $category->delete();
        return back()->with('message', 'Data deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $cate = Category::where('name', 'LIKE',  $search . '%')->orwhere('image', 'LIKE',  $search . '%')->paginate(5);
        }

        return view('layout.menu.category' , compact('cate'));
    }

}
