<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\News\PostController;
use App\Http\Controllers\Tags\TagsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Categories\CategoryController;
use Illuminate\Http\Request;

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

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',function(){
    return view('Admin.admin');
})->middleware('auth:admin');

//========================Categories=======================
    Route::resource('Categories', CategoryController::class);

//==========================News===========================
    Route::resource('News', PostController::class);
Route::post('Filter_News', [PostController::class,'Filter_Classes'])->name('Filter_Classes');

//==========================Tags===========================
Route::resource('Tags', TagsController::class);


Route::get('/{page}', [AdminController::class,'index']);
