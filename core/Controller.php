<?php

namespace Core;

use MatthiasMullie\Minify;

class Controller {
    protected $baseURL;

    public function __construct() {
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];

        $this->baseURL = $scheme . '://' . $host;
        $this->baseURL .= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';
    }

    protected function minifyCSS($filePath) {
        try {
            $minifier = new Minify\CSS($filePath);
            $minifiedCSS = $minifier->minify();

            $minifiedCSS = preg_replace('/\s+/', ' ', $minifiedCSS);
            $minifiedCSS = preg_replace('/\s*([{}|:;,])\s*/', '$1', $minifiedCSS);

            return $minifiedCSS;
        } catch (\Exception $e) {
            echo "Error minifying CSS: " . $e->getMessage();
            return null;
        }
    }

    protected function minifyJS($filePath) {
        try {
            $minifier = new Minify\JS($filePath);
            return $minifier->minify();
        } catch (\Exception $e) {
            echo "Error minifying JS: " . $e->getMessage();
            return null;
        }
    }

	public function render($view, $data = []) {
		$config = require_once __DIR__ . '/../config/app.php';
		$basePath = $config['basePath'];
		$minified = $config['minified'];

		$data['baseURL'] = $this->baseURL;
		$data['basePath'] = $basePath;
		$data['minified'] = $minified;

		$layoutFile = __DIR__ . '/../app/Views/layouts/layout.php';
		$viewFile = __DIR__ . '/../app/Views/' . $view . '.php';

		$cssFilePath = __DIR__ . '/../public/assets/css/style.css';
		$jsFilePath = __DIR__ . '/../public/assets/js/app.js';
		$minifiedCSSFilePath = __DIR__ . '/../public/assets/css/style.min.css';
		$minifiedJSFilePath = __DIR__ . '/../public/assets/js/app.min.js';

		if ($minified || !file_exists($minifiedCSSFilePath) || !file_exists($minifiedJSFilePath)) {
			$minifiedCSS = $this->minifyCSS($cssFilePath);
			$minifiedJS = $this->minifyJS($jsFilePath);

			if ($minifiedCSS) {
				file_put_contents($minifiedCSSFilePath, $minifiedCSS);
			}

			if ($minifiedJS) {
				file_put_contents($minifiedJSFilePath, $minifiedJS);
			}
		}

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
