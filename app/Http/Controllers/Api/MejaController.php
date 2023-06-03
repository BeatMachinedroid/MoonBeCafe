<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class MejaController extends Controller
{
    public function index()
    {
        $meja = Table::all();
        return $this->sendJson($meja);
    }
}
