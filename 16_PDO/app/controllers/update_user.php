<?php

use app\models\User;

$user = new User;

$updated = $user->update($_POST);

header('Location:/');