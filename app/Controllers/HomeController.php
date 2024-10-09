<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'LitePHP',
            'description' => 'Selamat datang di LitePHP, sebuah framework PHP ringan untuk membangun aplikasi web dengan cepat dan efisien.',
            'keywords' => 'LitePHP, framework, PHP, pengembangan web, aplikasi web',
            'author' => 'I-As.Dev',
            'assetPath' => $this->asset('')
        ]; 
        $this->view('home', $data); 
    }
}
