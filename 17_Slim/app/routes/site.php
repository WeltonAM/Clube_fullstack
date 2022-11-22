<?php

use app\controllers\Home;
use app\controllers\Login;

$cache = require '../app/middlewares/cache.php';

$app->get('/', Home::class.":index")->add($cache('site/home'));
$app->get('/login', Login::class.":index");
$app->post('/login', Login::class.":store");
$app->get('/logout', Login::class.":destroy");