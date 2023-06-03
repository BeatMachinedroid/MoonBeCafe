<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MejaController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('meja', [MejaController::class, 'index']);
Route::get('menu', [MenuController::class, 'index']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('order', [OrderController::class, 'index']);
Route::post('order/input', [OrderController::class, 'store']);
Route::get('order/status', [OrderController::class, 'statusDetail']);
Route::post('order/cancel', [OrderController::class, 'cancel']);
