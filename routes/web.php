<?php
use Core\Router;

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ErrorController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/about', [AboutController::class, 'index']);
