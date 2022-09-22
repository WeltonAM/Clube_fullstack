<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use app\database\Connection;

header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['senha']);

$pdo = Connection::connect();

$prepare = $pdo->prepare("select * from clientes where email = :email");
$prepare->execute([
    'email' => $email,
]);

$userFound = $prepare->fetch();

if(!$userFound){
    http_response_code(401);
}

echo json_encode($userFound->senha);

// if(!password_verify($password, $userFound->senha)){
//     http_response_code(401);
// }

$payload = [
    'exp' => time() + 10,
    'iat' => time(),
    'email' => $email
];

$encode = JWT::encode($payload, $_ENV['KEY'], 'HS256');

echo json_encode($encode);