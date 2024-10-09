<?php

namespace Core;

class View {
	public static function render($view, $data = []) {
		extract($data);

		$viewPath = "../app/Views/{$view}.php";
		error_log("Rendering view: " . $viewPath);

		if (file_exists($viewPath)) {
			require $viewPath;
		} else {
			throw new \Exception("View '{$view}' not found.");
		}
	}
}
