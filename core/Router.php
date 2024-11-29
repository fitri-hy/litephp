<?php

namespace Core;

class Router {
    private static $routes = [];

    public static function get($route, $action) {
        self::$routes['GET'][$route] = $action;
    }

    public static function post($route, $action) {
        self::$routes['POST'][$route] = $action;
    }

    public static function put($route, $action) {
        self::$routes['PUT'][$route] = $action;
    }

    public static function delete($route, $action) {
        self::$routes['DELETE'][$route] = $action;
    }

    public static function dispatch($url, $method) {
        foreach (self::$routes[$method] as $route => $action) {
            $pattern = self::convertToRegex($route);

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                [$controller, $method] = $action;

                if (class_exists($controller) && method_exists($controller, $method)) {
                    call_user_func_array([new $controller, $method], $matches);
                    return;
                } else {
                    http_response_code(500);
                    echo "Controller or method not found.";
                    return;
                }
            }
        }

        self::show404();
    }

    private static function convertToRegex($route) {
        return '#^' . preg_replace('/(:[a-zA-Z0-9_]+)/', '([a-zA-Z0-9_-]+)', $route) . '$#';
    }

    private static function show404() {
        http_response_code(404);
        $controller = new \App\Controllers\ErrorController();
        $controller->index();
    }
}
