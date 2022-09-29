<?php

require '../vendor/autoload.php';

use app\database\models\User;
use app\database\activerecord\Find;
use app\database\activerecord\Delete;
use app\database\activerecord\Insert;
use app\database\activerecord\Update;

$user = new User;
// $user->firstName = 'Frô';
// $user->lastName = 'Lrinda';

echo $user->execute(new Delete(field:'id', value:2));