<?php

require __DIR__ . '/View.php';
const error_directory = BASE_DIR . '/pages/errors';

class Router {
    protected $routes = [];

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function handle(string $uri) {
        $uri = $this->normalizePath($uri);

        if (defined('MAINTENANCE') && MAINTENANCE === 'true') {
            $this->maintenance();
            return;
        }


        if (array_key_exists($uri, $this->routes)) {
            $file = $this->routes[$uri];
            View::render($file);
        } else {
            $this->notFound();
        }
    }

    protected function normalizePath(string $uri): string {
        $path = parse_url($uri, PHP_URL_PATH);
        return rtrim($path, '/') ?: '/';
    }

    protected function notFound() {
        http_response_code(404);
        require error_directory.'/404.php';
    }

    protected function maintenance() {
        http_response_code(503);
        return error_directory.'/503.php';
    }
}
