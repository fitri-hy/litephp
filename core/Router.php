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
        $action = self::$routes[$method][$url] ?? null;

        if ($action) {
            [$controller, $method] = $action;

            if (class_exists($controller) && method_exists($controller, $method)) {
                (new $controller)->$method();
            } else {
                http_response_code(500);
                echo "Controller or method not found.";
            }
        } else {
            self::show404();
        }
    }

    // Show 404 error page
    private static function show404() {
        http_response_code(404);
        $controller = new \App\Controllers\ErrorController();
        $controller->index();
    }
}
