<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TransactionController;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'index'])->name('loginApi');

// Route::middleware('authApi:api')->group(function () {

Route::get('/user', [AuthController::class, 'userInfo']);
Route::resource('category', CategoryController::class);
Route::resource('category', CategoryController::class);
Route::delete('category/{id}', [CategoryController::class, 'destroy']);

Route::resource('product', ProductController::class);
Route::delete('product/{product}/delete', [ProductController::class, 'destroy']);

Route::post('transaction', [TransactionController::class, 'store']);

// });
