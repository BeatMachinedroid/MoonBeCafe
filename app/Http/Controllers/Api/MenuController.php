<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::with('cate')->get();
        return $this->sendJson($menu, 'berhasil');
    }
}
