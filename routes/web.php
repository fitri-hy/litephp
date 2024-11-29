<?php
use Core\Router;

use App\Controllers\HomeController;
use App\Controllers\AboutController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/about', [AboutController::class, 'index']);
