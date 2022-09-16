<?php

require "vendor/autoload.php";

use app\classes\Person;
use app\classes\Activites;

$person = new Person;
$person->age = 27;
$person->name = 'Juliana';
$person->email = 'ju@hta.com';

echo $person->data();

$person2 = new Person;
$person2->age = 26;
$person2->name = 'Frô';
$person2->email = 'fro@karla.com';

echo $person2->data();

$activities = new Activities;
echo $activities->jump();