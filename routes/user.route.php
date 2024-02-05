<?php

include_once(dirname(__FILE__) . '/../controllers/user.controller.php');


$url = array_filter(explode('/', $_SERVER['REQUEST_URI']));

$method = $_SERVER['REQUEST_METHOD'];
session_start();

if (array_key_exists('3', $url)) {
    if ($url['3'] == 'all' and $method == 'GET') {
        echo UserController::getAllUsers();
        http_response_code(200);
    } else if ($url['3'] == 'login' and $method == 'PUT') {
        $data = (array) json_decode(file_get_contents('php://input'));
        echo UserController::login($data);
        http_response_code(200);
    } else if ($url['3'] == 'signup' and $method == 'PUT') {
        $data = (array) json_decode(file_get_contents('php://input'));
        echo UserController::signup($data);
        http_response_code(200);
    }
}

session_destroy();
