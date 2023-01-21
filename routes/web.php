<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\News\PostController;
use App\Http\Controllers\Tags\TagsController;
use App\Http\Controllers\Categories\CategoryController;

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
    return view('auth.login');
});

//========================Auth=======================
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//========================Categories=======================
    Route::resource('Categories', CategoryController::class);

//==========================News===========================
    Route::resource('News', PostController::class);
Route::post('Filter_News', [PostController::class,'Filter_Classes'])->name('Filter_Classes');

//==========================Tags===========================
Route::resource('Tags', TagsController::class);


Route::get('/{page}', [AdminController::class,'index']);
