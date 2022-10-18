<?php

require "../bootstrap.php";

use app\classes\Uri;
use app\classes\Layout;
use app\classes\Routes;

$routes = [
    '/' => 'controllers/index',
    '/create_user' => 'controllers/create_user',
    '/store_user' => 'controllers/store_user',
    '/edit_user' => 'controllers/edit_user',
    '/update_user' => 'controllers/update_user',
];

$uri = Uri::load();

$layout = new Layout;

require Routes::load($routes, $uri);

require $layout->master('layout');