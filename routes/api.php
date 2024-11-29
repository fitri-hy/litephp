<?php
use Core\Router;

use App\Controllers\ApiController;

Router::get('/api/posts', [ApiController::class, 'getPosts']);
Router::post('/api/posts', [ApiController::class, 'createPost']);
Router::put('/api/posts/{id}', [ApiController::class, 'updatePost']);
Router::delete('/api/posts/{id}', [ApiController::class, 'deletePost']);
