<?php

use app\classes\Login;

require "../app/classes/Login.php";

$login = new Login;
$login->email = 'ju@hta.com';
$login->password = '123';
$login->auth();

$user = ['name' => 'Juliana', 'email' => 'ju@hta.com'];
$userObj = (object)$user;

var_dump($userObj->name);
