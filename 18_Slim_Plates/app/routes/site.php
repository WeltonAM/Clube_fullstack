<?php

use app\classes\Upload;
use app\controllers\Home;
use app\controllers\Login;
use app\controllers\Resize;

$app->get('/', Home::class.":index");
$app->get('/resize', Resize::class.":index");
$app->get('/login', Login::class.":index");
$app->post('/login', Login::class.":store");
$app->get('/logout', Login::class.":destroy");
$app->post('/upload', Upload::class.":upload");