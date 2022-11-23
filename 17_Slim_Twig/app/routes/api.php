<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group) use($logged){
    $group->get('/users', function($request, $response){
        $payload = json_encode(['name' => 'Juliana']);

        $response->getBody()->write($payload);

        return $response->withHeader('Content-type', 'application/json', 200);
    });
})->add($logged);