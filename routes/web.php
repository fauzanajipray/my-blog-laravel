<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


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

Route::get('/   ', function () {
    return view('welcome');
});

Route::get('category', [CategoryController::class, 'index']);

// Route Akses Admin

Route::get('register', [AdminController::class, 'register']);

Route::post('register', [AdminController::class, 'postRegister']);

Route::get('login', [AdminController::class, 'login']);

Route::post('login', [AdminController::class, 'postLogin']);

Route::get('logout', [AdminController::class, 'logout']);

// Route Menu Admin

Route::middleware('checkAdmin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
    });
});