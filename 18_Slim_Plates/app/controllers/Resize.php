<?php

namespace app\controllers;

class Resize
{
    public function index($request, $response)
    {
        
        render('site/resize', ['title' => 'Resize']);

        return $response;

    }
}