<?php
require "../../config.php";

use app\Models\User;

$user = new User;

$name = strip_tags($_POST['name']);
$lastName = strip_tags($_POST['lastName']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

$registered = $user->create($name, $lastName, $email, $password);

if($registered){
    echo 'registered';
} else {
    echo 'error';
}