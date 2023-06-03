<?php

namespace App\Http\Controllers\Web\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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

    public function view_acount()
    {
        $user = User::paginate(5);
        if(Auth::check()){
            return view('Auth.akun' , compact('user'));
        }else{
            return redirect()->route('view.login');
        }
    }

    public function view_dashboard()
    {

        if(Auth::check()) {
                $menu = Menu::with('cate')->get();
                $meja = Table::all();
                $order = Order::all();
                $hasil = Order::sum('total_price');

                $orders = Order::select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('COUNT(DISTINCT order_code) as total_orders'),
                    DB::raw('sum(total_price) as pemasukan'),
                )
                ->groupBy('year')
                ->get();

                // $months = [];

            // return $chart;
                return view('layout.dashboard-kasir' , compact('menu','meja','order','hasil','orders'));
        }else{
            return redirect()->route('view.login');
        }
    }
// ====================================================================

    public function view_menu()
    {
        $menu = Menu::paginate(5);
        $cate = Category::all();
        if(Auth::check()){
            return view('layout.menu.menu' , compact('menu', 'cate'));
        }else{
            return redirect()->route('view.login');
        }
    }

// ================================================================
    public function view_category()
    {
        if(Auth::check()){
            $cate = Category::paginate(5);
            return view('layout.menu.category', compact('cate'));
        }else{
            return redirect()->route('view.login');
        }
    }
// ============================================================

    public function view_table()
    {
        if(Auth::check()){
            $meja = Table::paginate(5);
            return view('layout.table.table' , compact('meja'));
        }else{
            return redirect()->route('view.login');
        }
    }

// ============================================================

public function view_order()
{
    $menu = Menu::with('cate')->get();
    $meja = Table::all();
    $order = Order::orderby('created_at', 'desc')->paginate(5);
    if(Auth::check()){
        return view('layout.orders.orders'  , compact('meja', 'menu', 'order'));
    }else{
        return redirect()->route('view.login');
    }
}

}
