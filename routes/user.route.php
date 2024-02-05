<?php

include_once(dirname(__FILE__) . '/../controllers/user.controller.php');


$url = array_filter(explode('/', $_SERVER['REQUEST_URI']));

$method = $_SERVER['REQUEST_METHOD'];
session_start();

if (array_key_exists('3', $url)) {
    if ($url['3'] == 'all' and $method == 'GET') {
        echo UserController::getAllUsers();
    }
}

session_destroy();
