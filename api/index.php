<?php

/**
 * Punto de entrada Serverless para Vercel
 * Redirige todas las solicitudes a Laravel en entorno serverless.
 */

// Crear directorios temporales requeridos por Laravel en /tmp (única ruta con permisos de escritura en Vercel)
$directories = [
    '/tmp/storage',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/bootstrap',
    '/tmp/storage/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Configurar variables de entorno críticas para Serverless
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('APP_SERVICES_CACHE=/tmp/storage/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/storage/bootstrap/cache/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/storage/bootstrap/cache/config.php');
putenv('APP_ROUTES_CACHE=/tmp/storage/bootstrap/cache/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/storage/bootstrap/cache/events.php');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Cargar el archivo principal de Laravel
require __DIR__ . '/../public/index.php';
