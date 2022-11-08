<?php

session_start();

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require '../app/routes/site.php';
require '../app/routes/user.php';

$app->run();


