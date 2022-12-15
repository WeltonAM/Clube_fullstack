<?php
require "../../config.php";

use app\Models\User;

$user = new User;

$name = strip_tags($_POST['name']);

$searched = $user->search($name);

if(!$searched || empty($name)){
    echo 'Not found';
} else {
    echo json_encode($searched);
}
