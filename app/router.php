<?php

// Ruta base de la aplicación
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if (strpos($uri, '/storage/') === 0) {
    $filePath = __DIR__ . '/storage/app/public' . substr($uri, 8);
    if (file_exists($filePath) && is_file($filePath)) {

        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'pdf' => 'application/pdf',
        ];
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream';

        header('Content-Type: ' . $mimeType);
        header('Cache-Control: public, max-age=31536000');
        readfile($filePath);
        exit;
    }
}


require_once __DIR__.'/public/index.php';