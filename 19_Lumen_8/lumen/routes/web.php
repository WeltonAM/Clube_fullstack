<?php

$router->get('/', 'Home@index');
$router->get('/post/{slug}', 'Post@show');
