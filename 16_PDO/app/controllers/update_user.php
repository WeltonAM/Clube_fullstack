<?php

use app\models\User;

$user = new User;

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$updated = $user->update($_POST, ['id' => $id]);

if($updated){
    header('location:/');
}