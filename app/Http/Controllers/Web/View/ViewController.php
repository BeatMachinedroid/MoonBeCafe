<?php

namespace App\Http\Controllers\Web\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use App\Models\Customer;

class ViewController extends Controller
{
    public function view_login()
    {
        return view('Auth.login');
    }

    public function view_register()
    {
        return view('Auth.register');
    }

    public function view_forgot()
    {
        return view('Auth.forgot');
    }

    public function view_dashboard()
    {
        if(Auth::check()) {
            if(Auth::user()->role == 'admin') {
                $menu = Menu::all();
                return view('layout.dashboard-admin', compact('menu'));
            }else {
                $menu = Menu::with('category')->get();
                $costumer = Customer::all();
                $order = Order::all();

                return view('layout.dashboard-kasir' , compact('menu','costumer','order'));
            }
        }else{
            return redirect()->route('view.login');
        }
    }

    public function view_add_menu()
    {
        if(Auth::check()){
            return view('layout.menu.add');
        }else{
            return redirect()->route('view.login');
        }
    }

    public function view_menu()
    {
        if(Auth::check()){
            return view('layout.menu.menu');
        }else{
            return redirect()->route('view.login');
        }
    }

    public function view_category()
    {
        if(Auth::check()){
            $cate = Category::paginate(5);
            return view('layout.menu.category', compact('cate'));
        }else{
            return redirect()->route('view.login');
        }
    }


    public function view_orders()
    {
        if(Auth::check()){
            return view('layout.orders.orders');
        }else{
            return redirect()->route('view.login');
        }
    }
}
