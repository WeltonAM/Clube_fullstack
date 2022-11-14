<?php

use app\controllers\User;

$app->get('/user/create', User::class.':create');
$app->get('/user/edit/{id}', User::class.':edit');
$app->post('/user/store', User::class.':store');
$app->put('/user/update/{id}', User::class.':update');
$app->delete('/user/delete', User::class.':destroy');