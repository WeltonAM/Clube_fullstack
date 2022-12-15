<?php
require "../../config.php";

use app\Models\User;

sleep(1);

$user = new User;

echo json_encode($user->all());