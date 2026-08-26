<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Configurar storage path para entornos Serverless como Vercel
$storagePath = getenv('APP_STORAGE') ?: ((isset($_SERVER['VERCEL']) || getenv('VERCEL')) ? '/tmp/storage' : null);

if ($storagePath) {
    foreach (['framework/views', 'framework/cache/data', 'framework/sessions', 'logs', 'app/public', 'bootstrap/cache'] as $sub) {
        $dir = $storagePath . '/' . $sub;
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

if ($storagePath) {
    $app->useStoragePath($storagePath);
}

return $app;
