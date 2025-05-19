<?php
session_start();
const BASE_DIR = __DIR__;

require BASE_DIR . '/core/Env.php';
Env::load(BASE_DIR . '/.env');
require BASE_DIR . '/core/Router.php';
require BASE_DIR . '/includes/header.php';
$routes = [
    '/' => 'home',
    '/login' => 'auth.login',
    '/dashboard' => 'user.dashboard',
    '/logout' => 'user.logout'
];
$router = new Router($routes);
$router->handle($_SERVER['REQUEST_URI']);