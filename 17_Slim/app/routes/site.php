<?php

use app\controllers\Home;
use app\controllers\Login;

$app->get('/', Home::class.":index");
$app->get('/login', Login::class.":index");
$app->post('/login', Login::class.":store");