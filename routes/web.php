<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainMenuController;
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

// Route::get('category', [CategoryController::class, 'index']);

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

        //fix
        Route::prefix('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/create', [CategoryController::class, 'create']);
            Route::post('/create', [CategoryController::class, 'postCreate']);
            Route::get('/edit/{id}', [CategoryController::class, 'edit']);
            Route::post('/edit/{id}', [CategoryController::class, 'postEdit']);
            Route::get('/delete/{id}', [CategoryController::class, 'delete']);
        });

        //fix
        Route::prefix('post')->group(function(){
            Route::get('/', [PostController::class, 'index']);
            Route::get('/create', [PostController::class, 'create']);
            Route::post('/create', [PostController::class, 'postCreate']);
            Route::get('/edit/{id}', [PostController::class, 'edit']);
            Route::post('/edit/{id}', [PostController::class, 'postEdit']);
            Route::get('/delete/{id}', [PostController::class, 'delete']);
        });
        
        Route::prefix('mainmenu')->group(function(){
            Route::get('/', [MainMenuController::class, 'index']);
            Route::get('/create', [MainMenuController::class, 'create']);
            Route::post('/create', [MainMenuController::class, 'postCreate']);
            Route::get('/edit/{id}', [MainMenuController::class, 'edit']);
            Route::post('/edit/{id}', [MainMenuController::class, 'postEdit']);
            Route::get('/delete/{id}', [MainMenuController::class, 'delete']);
        });

        Route::prefix('slider')->group(function(){
            Route::get('/', [SliderController::class, 'index']);
            Route::get('/create', [SliderController::class, 'create']);
            Route::post('/create', [SliderController::class, 'postCreate']);
            Route::get('/edit/{id}', [SliderController::class, 'edit']);
            Route::post('/edit/{id}', [SliderController::class, 'postEdit']);
            Route::get('/delete/{id}', [SliderController::class, 'delete']);
        });

        Route::get('message', [MessageController::class, 'index']);
        
        Route::prefix('profile')->group(function(){
            Route::get('{id}', [AdminController::class, 'edit']);
            Route::post('{id}', [AdminController::class, 'update']);
        });
    });
});
