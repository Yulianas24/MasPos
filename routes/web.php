<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CategoryController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {

  Route::get('/', [HomeController::class, 'index']);
  Route::get('/logout', [LoginController::class, 'logout']);

  Route::resource('/add-category', CategoryController::class);

  Route::get('/cart', [ProductController::class, 'showCart']);

  Route::post('/cart/pay', [ProductController::class, 'pay']);

  Route::get('/add-product', [ProductController::class, 'index']);
  Route::post('/add-product', [ProductController::class, 'store']);
  Route::post('/{product:product_name}/addcart', [ProductController::class, 'addCart']);
  Route::delete('/{product:product_name}/delete', [ProductController::class, 'destroy']);
});
