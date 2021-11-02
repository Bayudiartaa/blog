<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;

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

/*
    FRONTEND
*/

Route::get('/', [PublicController::class, 'index'])->name('post.index');

Route::get('/post/show/{post}', [PublicController::class, 'show'])->name('post.show');
Route::get('/category/show/{category}', [PublicController::class, 'category'])->name('category.show');

/*
    AUTHENTICATION
*/
Auth::routes();

/*
    BACKEND
*/
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


