<?php

use app\models\User;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$user = new User;
$userFound = $user->find('id', $id);

$layout->add('edit_user');
