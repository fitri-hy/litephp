<?php
namespace App\Controllers;

use Core\Controller;

class ErrorController extends Controller {
    public function index() {
        $data = [
            'title' => '404 | Lite PHP',
            'description' => 'Light, fast and efficient.',
            'keywords' => 'lite php, framework, php'
        ];

        $this->render('404', $data);
    }
}

?>
