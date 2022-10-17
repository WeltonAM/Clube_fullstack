<?php

use app\models\User;

require "../app/views/index.php";

$user = new User;
dd($user->all());