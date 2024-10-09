<?php

namespace Core;

class Controller {
    public function view($view, $data = []) {
        View::render($view, $data);
    }

    public function model($model) {
        $model = "App\\Models\\{$model}";
        return new $model();
    }

    protected function asset($path) {
        $url = '/assets/' . $path;
        error_log("Asset URL: " . $url);
        return $url;
    }
}
