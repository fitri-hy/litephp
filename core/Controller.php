<?php

namespace Core;

class Controller {
    protected $baseURL;
	
	public function __construct() {
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];

        $this->baseURL = $scheme . '://' . $host;
        $this->baseURL .= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';
    }
	
    public function render($view, $data = []) {
        $config = require_once __DIR__ . '/../config/app.php';
        $basePath = $config['basePath'];

		$data['baseURL'] = $this->baseURL;
        $data['basePath'] = $basePath;

        $layoutFile = __DIR__ . '/../app/Views/layouts/layout.php';
        $viewFile = __DIR__ . '/../app/Views/' . $view . '.php';

        if (file_exists($viewFile)) {
            extract($data);

            ob_start();
            include $viewFile;
            $content = ob_get_clean();

            include $layoutFile;
        } else {
            echo "View not found: " . $view;
        }
    }
}
