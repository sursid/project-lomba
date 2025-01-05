<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Sosmed\IndexController;
use App\Http\Controllers\Sosmed\StoryController;
use App\Http\Controllers\Sosmed\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::middleware(['auth', 'member'])->group(function () {
    Route::prefix('sosmed')->group(function () {
        Route::get('/', [IndexController::class, 'index']);
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::post('/posts/toggle-like', [PostController::class, 'toggleLike'])->name('posts.toggle-like');
    });
    Route::post('/api/story/view', [StoryController::class, 'recordView']);
    Route::get('/api/story/{story}/viewers', [StoryController::class, 'getViewers']);
    Route::post('/logout', [IndexController::class, 'logout'])->name('logout');
});