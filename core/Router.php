<?php

namespace Core;

class Router {
    private static $routes = [];

    // Define GET route
    public static function get($route, $action) {
        self::$routes['GET'][$route] = $action;
    }

    // Define POST route
    public static function post($route, $action) {
        self::$routes['POST'][$route] = $action;
    }

    // Define PUT route
    public static function put($route, $action) {
        self::$routes['PUT'][$route] = $action;
    }

    // Define DELETE route
    public static function delete($route, $action) {
        self::$routes['DELETE'][$route] = $action;
    }

    // Dispatch the route based on the URL and method
    public static function dispatch($url, $method) {
        // Check if the route is registered
        $action = self::$routes[$method][$url] ?? null;

        if ($action) {
            // If route exists, split into controller and method
            [$controller, $method] = $action;

            if (class_exists($controller) && method_exists($controller, $method)) {
                // Call the controller method
                (new $controller)->$method();
            } else {
                // Controller or method not found
                http_response_code(500);
                echo "Controller or method not found.";
            }
        } else {
            // If route does not exist, show 404
            self::show404();
        }
    }

    // Show 404 error page
    private static function show404() {
        http_response_code(404);
        $viewFile = __DIR__ . '/../app/Views/404.php';

        if (file_exists($viewFile)) {
            // Include 404 page if exists
            require $viewFile;
        } else {
            // Default 404 message
            echo "404 - Page Not Found.";
        }
    }
}
