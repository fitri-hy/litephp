<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Lite PHP',
            'description' => 'Light, fast and efficient.',
            'keywords' => 'lite php, framework, php'
        ];

        $this->render('home', $data);
    }
}

?>
