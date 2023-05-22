<?php

namespace App\Http\Controllers\Web\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Table;


class OrderController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'meja' => 'required',
            'menu' => 'required',
            'jumlah' => 'required',
            'payment_status' => 'required',
        ]);

        $order = new Order;
        $menu = Menu::findOrFail($request->menu);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->meja = $request->meja;
        $order->menu = $request->menu;
        $order->jumlah = $request->jumlah;
        $order->total_price = $request->jumlah * $menu->price;
        $order->payment_status = $request->payment_status;
        $order->save();
        // return $order;
        return redirect()->route('view.order')->with('message','Data created is successfully');
    }

    public function edit(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->meja = $request->meja;
        $order->menu = $request->menu;
        $order->jumlah = $request->jumlah;
        $order->total_price = $request->jumlah * $request->price;
        $order->payment_status = $request->payment_status;
        // return $order;
        $order->save();

        return redirect()->route('view.order')->with('message','Data Edited is successfully');
    }

    public function delete($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $menu->delete();
        return back()->with('message', 'deleted is successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $menu = Menu::with('cate')->get();
        $meja = Table::all();
            $order = Order::with('Menu','Meja')->where('name', 'LIKE',  $search . '%')->orwhere('payment_status', 'LIKE',  $search . '%')->paginate(5);
        return view('layout.orders.orders'  , compact('meja', 'menu', 'order'));
    }
}
