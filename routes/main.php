<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestSome;
use App\Http\Middleware\LogMiddleware;

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

Route::view('/', 'home.index')->name('home');

Route::redirect('/home', '/');

Route::get('/test', TestController::class)->name('test');
// Route::get('/test', TestController::class)->name('test')->middleware('token:secret');


Route::get('some', TestSome::class);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');


Route::resource('posts/{post}/comments', CommentController::class)->only(['index', 'show']);

// Route::fallback(function () {
//     return 'Fallback';
// });
