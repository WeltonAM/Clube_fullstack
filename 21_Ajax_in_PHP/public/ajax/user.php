<?php
require "../../config.php";

use app\Models\User;

$user = new User;

echo json_encode($user->all());