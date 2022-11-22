<?php

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
require '../app/routes/site.php';

$app->run();