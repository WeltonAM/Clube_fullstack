<?php

use app\classes\Crud;
use app\classes\Login;
use app\models\Products;
use app\models\User;

require "../vendor/autoload.php";

$login = new Login;
$login->email = 'ju@hta.com';
$login->password = '123';
echo $login->auth();
echo '<br />';

$user = ['name' => 'Juliana', 'email' => 'ju@hta.com'];
$userObj = (object)$user;
echo $userObj->name;
echo '<br />';

$crud = new Crud;
echo $crud->read();
echo '<br />';

$user = new User;
echo $user->all();
echo '<br />';
echo '<br />';

$product = new Products;
echo $product->all();
echo '<br />';

echo helper();