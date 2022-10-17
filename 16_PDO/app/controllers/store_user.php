<?php

use app\models\User;

$name = strip_tags($_POST['name']);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = strip_tags($_POST['password']);

$user = new User;
$user->insert([
    'name' => $name,
    'email' => $email,
    'password' => $password,
]);

if($user){
    header('location:/');
}