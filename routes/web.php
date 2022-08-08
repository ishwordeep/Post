<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
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

Route::get('register',[RegisterController::class,'index']);
Route::post('register',[RegisterController::class,'store'])->name('register');
Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'store'])->name('login');
Route::post('logout',[LogoutController::class,'store'])->name('logout');
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('posts',[PostController::class,'index'])->name('posts');
Route::post('posts',[PostController::class,'store'])->name('posts.store');

Route::post('posts/{post}/likes',[PostLikeController::class,'store'])->name('likes.store');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('unlikes');

Route::get('/', function () {
    return view('home');
})->name('home');
