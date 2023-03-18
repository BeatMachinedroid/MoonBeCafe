<?php

namespace App\Http\Controllers\Web\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5120',
            'price' => 'required',
        ]);


        $menu = new Menu;
        $menu->name = $request->name;
        $menu->category = $request->category;

        if($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $originalName = $image->getClientOriginalName();
            $image->storeAs('public/menus/' . $originalName);
        }
        
        $menu->image = $originalName;
        $menu->save();

        return redirect()->route('view.menu')->with('message','Data created is successfully');

    }

    public function Edit(Request $request)
    {

    }
}
