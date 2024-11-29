<?php

namespace App\Controllers;

use Core\Controller;

class AboutController extends Controller {
    public function index() {
        $data = [
            'title' => 'About | Lite PHP',
            'description' => 'Light, fast and efficient.',
            'keywords' => 'lite php, framework, php'
        ];

        $this->render('about', $data);
    }

}

?>