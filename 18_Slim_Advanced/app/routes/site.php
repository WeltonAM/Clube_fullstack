<?php

$app->get('/', function($request, $response){
    $response->getBody()->write('user');
    return $response;
});