<?php

require "../vendor/autoload.php";

use app\classes\{Crud, Login};

use app\models\{Products, User};

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