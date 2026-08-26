<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. Crear directorios temporales en /tmp solo si no existen (evita I/O en cada petición)
$storagePath = '/tmp/storage';

if (!is_dir($storagePath . '/bootstrap/cache')) {
    $dirs = [
        $storagePath . '/app/public',
        $storagePath . '/framework/cache/data',
        $storagePath . '/framework/sessions',
        $storagePath . '/framework/views',
        $storagePath . '/logs',
        $storagePath . '/bootstrap/cache',
    ];

    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}

// 2. Establecer variables de entorno antes de que Laravel arranque
$envVars = [
    'APP_STORAGE' => $storagePath,
    'APP_SERVICES_CACHE' => $storagePath . '/bootstrap/cache/services.php',
    'APP_PACKAGES_CACHE' => $storagePath . '/bootstrap/cache/packages.php',
    'APP_CONFIG_CACHE' => $storagePath . '/bootstrap/cache/config.php',
    'APP_ROUTES_CACHE' => $storagePath . '/bootstrap/cache/routes-v7.php',
    'APP_EVENTS_CACHE' => $storagePath . '/bootstrap/cache/events.php',
    'VIEW_COMPILED_PATH' => $storagePath . '/framework/views',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
    'APP_MAINTENANCE_DRIVER' => 'file',
    'APP_MAINTENANCE_STORE' => 'array',
    'MAIL_MAILER' => 'smtp',
    'MAIL_HOST' => 'smtp.gmail.com',
    'MAIL_PORT' => '587',
    'MAIL_USERNAME' => 'fa2288050@gmail.com',
    'MAIL_PASSWORD' => 'trwmvgtwoskjezcj',
    'MAIL_ENCRYPTION' => 'tls',
    'MAIL_FROM_ADDRESS' => 'fa2288050@gmail.com',
    'MAIL_FROM_NAME' => 'Studio Katracho',
];

foreach ($envVars as $key => $val) {
    putenv("{$key}={$val}");
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
}

// 3. Emular mod_rewrite para el servidor integrado de PHP en Vercel
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? ''
);

if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = '/index.php';

try {
    require_once __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    echo "<!DOCTYPE html><html><head><title>Error en Laravel</title><meta charset='utf-8'><style>body{background:#0d1117;color:#c9d1d9;font-family:system-ui,-apple-system,sans-serif;padding:30px;}h1{color:#f85149;}pre{background:#161b22;padding:15px;border-radius:8px;overflow:auto;border:1px solid #30363d;}</style></head><body>";
    echo "<h1>Error en Laravel: " . htmlspecialchars($e->getMessage()) . "</h1>";
    echo "<p><strong>Archivo:</strong> " . htmlspecialchars($e->getFile()) . " en línea <strong>" . $e->getLine() . "</strong></p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</body></html>";
}

