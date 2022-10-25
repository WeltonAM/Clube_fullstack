<?php

namespace app\controllers;

class Home
{
    public function index($request, $response)
    {
        $response->getBody()->write("Index");
        return $response;
    }
}