<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()
        ->view('home')
        ->header('Cache-Control', 'public, max-age=0, s-maxage=3600, stale-while-revalidate=86400');
});

Route::get('/about', function () {
    return response()
        ->view('about')
        ->header('Cache-Control', 'public, max-age=0, s-maxage=3600, stale-while-revalidate=86400');
});

Route::get('/portfolio', function () {
    return response()
        ->view('portfolio')
        ->header('Cache-Control', 'public, max-age=0, s-maxage=3600, stale-while-revalidate=86400');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send']);
