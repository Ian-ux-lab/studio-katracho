<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

// Páginas públicas estáticas con Vercel Edge CDN Caching (entrega en ~20ms a nivel global)
Route::withoutMiddleware([
    StartSession::class,
    ShareErrorsFromSession::class,
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    ValidateCsrfToken::class,
])->group(function () {
    Route::get('/', function () {
        return response()
            ->view('home')
            ->header('Cache-Control', 'public, max-age=0, s-maxage=86400, stale-while-revalidate=604800');
    });

    Route::get('/about', function () {
        return response()
            ->view('about')
            ->header('Cache-Control', 'public, max-age=0, s-maxage=86400, stale-while-revalidate=604800');
    });

    Route::get('/portfolio', function () {
        return response()
            ->view('portfolio')
            ->header('Cache-Control', 'public, max-age=0, s-maxage=86400, stale-while-revalidate=604800');
    });
});

// Rutas de contacto (requieren sesión y CSRF para el formulario)
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send']);
