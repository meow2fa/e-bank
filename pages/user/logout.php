<?php
require BASE_DIR . '/core/Auth.php';

$auth = new Auth(BASE_DIR . '/data/users.json');

if ($auth->check()) {
    $auth->logout();
    header('location: /login');
}else {
    header('location: /login');
}