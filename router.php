<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (strpos($uri, '/storage/') === 0) {
    $filePath = __DIR__ . '/storage/app/public' . substr($uri, 8);
    if (file_exists($filePath) && is_file($filePath)) {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $types = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'pdf' => 'application/pdf',
        ];
        if (isset($types[$ext])) {
            header('Content-Type: ' . $types[$ext]);
        }
        header('Cache-Control: public, max-age=31536000');
        readfile($filePath);
        exit;
    }
}

if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    $ext = pathinfo($uri, PATHINFO_EXTENSION);
    $types = [
        'css' => 'text/css',
        'js'  => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'ico' => 'image/x-icon',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
    ];
    if (isset($types[$ext])) {
        header('Content-Type: ' . $types[$ext]);
    }
    return false;
}

require __DIR__ . '/public/index.php';