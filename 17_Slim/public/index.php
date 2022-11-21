<?php

session_start();

require '../vendor/autoload.php';

use app\classes\TwigGlobal;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;

$app = AppFactory::create();

TwigGlobal::set('logged_in', $_SESSION['is_logged_in'] ?? '');
TwigGlobal::set('user', $_SESSION['user_logged_data'] ?? '');

require '../app/routes/site.php';
require '../app/routes/user.php';

$methodOverrideMiddleware = new MethodOverrideMiddleware();
$app->add($methodOverrideMiddleware);

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATH'], '/{routes:.+}', function ($request, $response){
    $response->getBody()->write("Route doesn't exist");
    return $response;
});

$app->run();


