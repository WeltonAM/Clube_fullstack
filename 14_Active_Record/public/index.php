<?php

require '../vendor/autoload.php';

use app\database\models\User;

$user = new User;
$user->firstName = 'Juliana';
$user->lastName = 'Karla';
$user->id = 1;

var_dump($user);