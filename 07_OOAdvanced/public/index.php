<?php

use app\classes\Crud;
use app\classes\Login;
use app\models\User;

require "../vendor/autoload.php";

$login = new Login;
$login->email = 'ju@hta.com';
$login->password = '123';
$login->auth();

$user = ['name' => 'Juliana', 'email' => 'ju@hta.com'];
$userObj = (object)$user;
echo $userObj->name;
echo '<br />';

$crud = new Crud;
echo $crud->read();
echo '<br />';

$user = new User;
echo $user->user();
echo '<br />';

echo helper();