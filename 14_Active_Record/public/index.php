<?php

require '../vendor/autoload.php';

use app\database\models\User;
use app\database\activerecord\Find;
use app\database\activerecord\Insert;
use app\database\activerecord\Update;

$user = new User;
$user->firstName = 'Juliana';
$user->lastName = 'Karla';
$user->id = 1;

echo $user->execute(new Find);

// var_dump($user);