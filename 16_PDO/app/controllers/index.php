<?php

use app\models\User;

$user = new User;

$users = $user->all();

$layout->add('home');