<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();
