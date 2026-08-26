<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Emular mod_rewrite para el servidor integrado de PHP en Vercel
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
    echo "<h1>Error en Laravel: " . htmlspecialchars($e->getMessage()) . "</h1>";
    echo "<p><strong>Archivo:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre style='background:#111;color:#fff;padding:15px;border-radius:8px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
