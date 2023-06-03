<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\View\ViewController;
use App\Http\Controllers\Web\Menu\MenuController;
use App\Http\Controllers\Web\Category\CategoryController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\Meja\MejaController;
use App\Http\Controllers\Web\Orders\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('view.login');
});
Route::get('/login', [ViewController::class, 'view_login'])->name('view.login');
Route::post('/login/proses', [AuthController::class, 'login'])->name('proses.login');
Route::get('/register', [ViewController::class, 'view_register'])->name('view.register');
Route::post('/register/proses', [AuthController::class, 'register'])->name('proses.register');
Route::get('/forgot', [ViewController::class, 'view_forgot'])->name('view.forgot');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// ===============================================================================
Route::get('/dashboard', [ViewController::class, 'view_dashboard'])->name('view.dashboard');
// ===============================================================================
Route::get('/menu', [ViewController::class, 'view_menu'])->name('view.menu');
Route::post('/menu/add', [MenuController::class, 'store'])->name('post.menu');
Route::get('/menu/search', [MenuController::class, 'search'])->name('search.menu');
Route::get('/menu/{id}/delete', [MenuController::class, 'delete']);
Route::put('/menu/edit', [MenuController::class, 'edit'])->name('put.menu');
// ==================================================================================
Route::get('/category', [ViewController::class, 'view_category'])->name('view.category');
Route::post('/category/add', [CategoryController::class, 'store'])->name('post.category');
Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('delete.category');
Route::put('/category/edit', [CategoryController::class,'edit'])->name('put.category');
Route::get('/category/search', [CategoryController::class, 'search'])->name('search.category');
// =====================================================================================
Route::get('/meja', [ViewController::class, 'view_table'])->name('view.meja');
Route::post('/meja/add/proses' , [MejaController::class , 'store'])->name('post.meja');
Route::get('/meja/{id}/download' , [MejaController::class , 'download']);
Route::get('/meja/{id}/delete' , [MejaController::class , 'delete']);
Route::post('/meja/edit', [MejaController::class , 'edit'])->name('meja.edit');
Route::get('/meja/search', [MejaController::class , 'search'])->name('search.meja');
// =====================================================================================
Route::get('/orders', [ViewController::class, 'view_order'])->name('view.order');
Route::post('/orders/add/proses', [OrderController::class, 'create'])->name('order.proses');
Route::post('/orders/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::get('/orders/{id}/delete' , [OrderController::class , 'delete']);
Route::get('/orders/search', [OrderController::class, 'search'])->name('order.search');

Route::get('/acount', [ViewController::class, 'view_acount'])->name('view.acount');
Route::put('/acount/edit', [AuthController::class, 'edit'])->name('put.user');
Route::get('/acount/{id}/delete', [AuthController::class, 'delete'])->name('delete.user');
