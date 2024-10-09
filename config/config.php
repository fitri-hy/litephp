<?php

return [
    'app_name' => 'LitePHP',
    'base_url' => getenv('BASE_URL') ?: 'http://localhost:8000',
    'debug' => getenv('APP_DEBUG') === 'true',
];
