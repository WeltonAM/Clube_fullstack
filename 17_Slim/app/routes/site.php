<?php

$app->get('/', function ($request, $response) {
    $response->getBody()->write("Index");
    return $response;
});