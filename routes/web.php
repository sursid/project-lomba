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