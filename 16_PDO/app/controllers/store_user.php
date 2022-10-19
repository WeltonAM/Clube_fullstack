<?php

use app\classes\Validation;
use app\models\User;

$validation = new Validation;
$validate = $validation->validate($_POST);

$user = new User;
$user->insert($validate);

if($user){
    header('location:/');
}