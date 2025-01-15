<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Sosmed\IndexController;
use App\Http\Controllers\Sosmed\StoryController;
use App\Http\Controllers\Sosmed\PostController;
use App\Http\Controllers\Sosmed\FriendRequestController;
use App\Http\Controllers\Sosmed\SuggestionsController;
use App\Http\Controllers\Sosmed\AllFriendController;
use App\Http\Controllers\Sosmed\BlockListController;
use App\Http\Controllers\Sosmed\EventController;
use App\Http\Controllers\Sosmed\GroupController;
use App\Http\Controllers\Sosmed\MarketplaceController;


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


        Route::get('/friend-request', [FriendRequestController::class, 'index']);
        Route::post('/friend-request/{friendshipId}/respond', [FriendRequestController::class, 'respondToRequest'])->name('friend-request.respond');

        Route::get('/suggestions', [SuggestionsController::class, 'index']);
        Route::post('/send-friend-request', [SuggestionsController::class, 'sendFriendRequest'])->name('sosmed.send-friend-request');

        Route::get('/all-friend', [AllFriendController::class, 'index']);

        Route::get('/block-list', [BlockListController::class, 'index']);
        Route::post('/block/{userId}/remove', [BlockListController::class, 'remove'])->name('block.remove');



        //Event
        Route::get('/event', [EventController::class, 'index'])->name('sosmed.event');
        Route::post('/event/register', [EventController::class, 'registerForEvent']);
        Route::get('/event/{event_id}', [EventController::class, 'show'])->name('event.show');

        //Group
        Route::get('/group', [GroupController::class, 'index']);
        Route::post('/group/join', [GroupController::class, 'join'])->name('group.join'); // Bergabung dengan grup
        Route::get('/group/{id}', [GroupController::class, 'show'])->name('sosmed.group.show');

        //Marketplace
        Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
        Route::get('/marketplace/{id}', [MarketplaceController::class, 'detail'])->name('marketplace.detail');
        Route::post('/add-to-cart', [MarketplaceController::class, 'addToCart'])->name('addToCart');
    });

    Route::post('/api/story/view', [StoryController::class, 'recordView']);
    Route::get('/api/story/{story}/viewers', [StoryController::class, 'getViewers']);
    Route::post('/logout', [IndexController::class, 'logout'])->name('logout');
});