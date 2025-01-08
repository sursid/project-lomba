<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Sosmed\IndexController;
use App\Http\Controllers\Sosmed\StoryController;
use App\Http\Controllers\Sosmed\PostController;

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
        
        // POST routes
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::post('/posts/toggle-like', [PostController::class, 'toggleLike'])->name('posts.toggle-like');
        Route::post('/comment', [IndexController::class, 'storeComment'])->name('comment.store');
        Route::post('/comments/{comment}/toggle-comment-like', [IndexController::class, 'toggleCommentLike'])->name('comments.toggle-like');
        Route::post('/comments/{comment}/reply', [IndexController::class, 'reply'])->name('comments.reply');
        Route::post('/replies/{replyId}/toggle-reply-like', [IndexController::class, 'toggleReplyLike'])->name('sosmed.replies.toggleLike');
        Route::post('/block-user/{userId}', [IndexController::class, 'blockUser'])->name('block.user');
        Route::post('/posts/{post}/save', [IndexController::class, 'toggleSavePost'])->name('posts.save');
        Route::post('/posts/{post}/report', [IndexController::class, 'reportPost'])->name('posts.report');
        Route::post('/upload-story', [IndexController::class, 'uploadStory']);

        // DELETE routes
        Route::delete('/comments/{comment}', [IndexController::class, 'destroyComment'])->name('sosmed.comments.destroy');
        Route::delete('/replies/{reply}', [IndexController::class, 'destroyReply'])->name('sosmed.replies.destroy');
        Route::delete('/posts/{postId}/delete', [IndexController::class, 'destroyPost']);
    });

    Route::post('/api/story/view', [StoryController::class, 'recordView']);
    Route::get('/api/story/{story}/viewers', [StoryController::class, 'getViewers']);
    Route::post('/logout', [IndexController::class, 'logout'])->name('logout');
});