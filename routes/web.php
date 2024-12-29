<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('components.index');
});
Route::get('/about-us', function () {
    return view('components.about-us');
});
Route::get('/our-commitments', function () {
    return view('components.our-commitments');
});
Route::get('/our-events', function () {
    return view('components.our-events');
});
Route::get('/our-farmers', function () {
    return view('components.our-farmers');
});
Route::get('/our-history', function () {
    return view('components.our-history');
});
Route::get('/event-detail', function () {
    return view('components.event-detail');
});
Route::get('/faq', function () {
    return view('components.faq');
});
Route::get('/gallery', function () {
    return view('components.gallery');
});
Route::get('/testimonial', function () {
    return view('components.testimonial');
});
Route::get('/portfolio-style-1', function () {
    return view('components.portfolio-style-1');
});
Route::get('/shop-products', function () {
    return view('components.shop-products');
});
Route::get('/shop-details', function () {
    return view('components.shop-details');
});
Route::get('/our-services', function () {
    return view('components.our-services');
});
Route::get('/service-detail', function () {
    return view('components.service-detail');
});
Route::get('/blog-full-width', function () {
    return view('components.blog-full-width');
});
Route::get('/blog-single', function () {
    return view('components.blog-single');
});
Route::get('/contact-us', function () {
    return view('components.contact-us');
});
Route::get('/all-friend', function () {
    return view('components.social.all-friend');
});

Route::get('/block-list', function () {
    return view('components.social.block-list');
});

Route::get('/event-details', function () {
    return view('components.social.event-details');
});

Route::get('/event', function () {
    return view('components.social.event');
});

Route::get('/favorites', function () {
    return view('components.social.favorites');
});

Route::get('/friend-request', function () {
    return view('components.social.friend-request');
});

Route::get('/group-details', function () {
    return view('components.social.group-details');
});

Route::get('/group', function () {
    return view('components.social.group');
});

Route::get('/index-2', function () {
    return view('components.social.index-2');
});

Route::get('/main', function () {
    return view('components.social.main');
});

Route::get('/marketplace-about', function () {
    return view('components.social.marketplace-about');
});

Route::get('/marketplace-connections', function () {
    return view('components.social.marketplace-connections');
});

Route::get('/marketplace-details-2', function () {
    return view('components.social.marketplace-details-2');
});

Route::get('/marketplace-details-3', function () {
    return view('components.social.marketplace-details-3');
});

Route::get('/marketplace-details-4', function () {
    return view('components.social.marketplace-details-4');
});

Route::get('/marketplace-details', function () {
    return view('components.social.marketplace-details');
});

Route::get('/marketplace-events', function () {
    return view('components.social.marketplace-events');
});

Route::get('/marketplace-group', function () {
    return view('components.social.marketplace-group');
});

Route::get('/marketplace-market', function () {
    return view('components.social.marketplace-market');
});

Route::get('/marketplace-photos', function () {
    return view('components.social.marketplace-photos');
});

Route::get('/marketplace-post', function () {
    return view('components.social.marketplace-post');
});

Route::get('/marketplace-videos', function () {
    return view('components.social.marketplace-videos');
});

Route::get('/marketplace', function () {
    return view('components.social.marketplace');
});

Route::get('/pages-create', function () {
    return view('components.social.pages-create');
});

Route::get('/pages-details', function () {
    return view('components.social.pages-details');
});

Route::get('/pages', function () {
    return view('components.social.pages');
});

Route::get('/profile-about', function () {
    return view('components.social.profile-about');
});

Route::get('/profile-chat', function () {
    return view('components.social.profile-chat');
});

Route::get('/profile-connections', function () {
    return view('components.social.profile-connections');
});

Route::get('/profile-edit', function () {
    return view('components.social.profile-edit');
});

Route::get('/profile-events', function () {
    return view('components.social.profile-events');
});

Route::get('/profile-group', function () {
    return view('components.social.profile-group');
});

Route::get('/profile-notification', function () {
    return view('components.social.profile-notification');
});

Route::get('/profile-photos', function () {
    return view('components.social.profile-photos');
});

Route::get('/profile-post', function () {
    return view('components.social.profile-post');
});

Route::get('/profile-videos', function () {
    return view('components.social.profile-videos');
});

Route::get('/public-profile-about', function () {
    return view('components.social.public-profile-about');
});

Route::get('/public-profile-connections', function () {
    return view('components.social.public-profile-connections');
});

Route::get('/public-profile-edit', function () {
    return view('components.social.public-profile-edit');
});

Route::get('/public-profile-events', function () {
    return view('components.social.public-profile-events');
});

Route::get('/public-profile-group', function () {
    return view('components.social.public-profile-group');
});

Route::get('/public-profile-photos', function () {
    return view('components.social.public-profile-photos');
});

Route::get('/public-profile-post', function () {
    return view('components.social.public-profile-post');
});

Route::get('/public-profile-videos', function () {
    return view('components.social.public-profile-videos');
});

Route::get('/saved-post-details', function () {
    return view('components.social.saved-post-details');
});

Route::get('/saved-post', function () {
    return view('components.social.saved-post');
});

Route::get('/setting', function () {
    return view('components.social.setting');
});

Route::get('/suggestions', function () {
    return view('components.social.suggestions');
});

Route::get('/videos', function () {
    return view('components.social.videos');
});

