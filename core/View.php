<?php

namespace Core;

class View {
    public static function render($view, $data = []) {
        extract($data);

        $viewFile = __DIR__ . '/../app/Views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            http_response_code(500);
            echo "View '$view' not found.";
        }
    }
}
