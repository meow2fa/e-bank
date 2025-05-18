<?php

class View {
    public static function render(string $file) {
        $error_directory = BASE_DIR . '/pages/errors';
        $path = BASE_DIR . '/pages';
        $file_type = '.php';
        $view = $path . '/' . str_replace('.', '/', $file) . $file_type;

        if (file_exists($view)) {
            require $view;
        } else {
            http_response_code(500);
            require $error_directory.'/404.php';
        }
    }
}
