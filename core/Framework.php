<?php

namespace Core;

class Framework {
    public static function run() {
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        require __DIR__ . '/../routes/web.php';
        require __DIR__ . '/../routes/api.php';

        Router::dispatch($url, $method);
    }
}
