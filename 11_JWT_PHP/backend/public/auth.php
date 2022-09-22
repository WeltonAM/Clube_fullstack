<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Firebase\JWT\JWT;

header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$authorization = $_SERVER["HTTP_AUTHORIZATION"];

$token = str_replace('Bearer ', '', $authorization);

try {
    $decoded = JWT::decode($token, $_SERVER['KEY'], ['HS256']);
} catch (Throwable $e) {
    if($e->getMessage() === 'Expired token'){
        http_response_code(401);
        die($e->getMessage());
    }
}