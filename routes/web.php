<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\View\ViewController;
use App\Http\Controllers\Web\Menu\MenuController;
use App\Http\Controllers\Web\Category\CategoryController;
use App\Http\Controllers\Web\Auth\AuthController;


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
// ===============================================================================
Route::get('/dashboard', [ViewController::class, 'view_dashboard'])->name('view.dashboard');
// ===============================================================================
Route::get('/Add-Menu', [ViewController::class, 'view_add_menu'])->name('view.add_menu');
Route::get('/Menu', [ViewController::class, 'view_menu'])->name('view.menu');
Route::post('/proses-menu', [MenuController::class, 'store'])->name('post.menu');
Route::post('/proses-category', [CategoryController::class, 'store'])->name('post.category');


Route::get('/category', [ViewController::class, 'view_category'])->name('view.category');
Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('delete.category');


Route::get('/Orders-history', [ViewController::class, 'view_orders'])->name('view.orders');
