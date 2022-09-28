<?php

require '../vendor/autoload.php';

use app\database\models\User;
use app\database\activerecord\Update;

$user = new User;
$user->firstName = 'Juliana';
$user->lastName = 'Karla';
$user->id = 1;

$user->update(new UpdateUser);

// var_dump($user);