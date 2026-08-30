<?php

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

register_shutdown_function(function () {
    $error = error_get_last();

    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], true)) {
        error_log(sprintf(
            'Vercel PHP fatal error: %s in %s:%s',
            $error['message'],
            $error['file'],
            $error['line']
        ));
    }
});

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])) {
    $storagePath = '/tmp/laravel-storage';

    $_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
    $_SERVER['LARAVEL_STORAGE_PATH'] = $storagePath;

    foreach ([
        'app/public',
        'framework/cache/data',
        'framework/sessions',
        'framework/testing',
        'framework/views',
        'logs',
    ] as $directory) {
        $path = $storagePath.'/'.$directory;

        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }
}

try {
    require __DIR__ . '/../public/index.php';
} catch (Throwable $exception) {
    error_log(sprintf(
        'Vercel Laravel exception: %s in %s:%s',
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    ));

    throw $exception;
}
