<?php

/**
 * Punto de entrada Serverless para Vercel
 * Redirige todas las solicitudes a Laravel en entorno serverless.
 */

// Crear directorios temporales requeridos por Laravel en /tmp (única ruta con permisos de escritura en Vercel)
$directories = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Configurar variables de entorno críticas para Serverless
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// Cargar el archivo principal de Laravel
require __DIR__ . '/../public/index.php';
