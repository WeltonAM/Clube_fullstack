<?php

require '../vendor/autoload.php';

use app\database\models\User;
use app\database\activerecord\Find;
use app\database\activerecord\Delete;
use app\database\activerecord\FindBy;
use app\database\activerecord\Insert;
use app\database\activerecord\Update;
use app\database\activerecord\FindAll;

$user = new User;
// $user->firstName = 'Frô';
// $user->lastName = 'Lrinda';

var_dump($user->execute(new FindAll(fields:'firstName')));