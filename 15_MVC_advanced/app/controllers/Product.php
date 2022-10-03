<?php

namespace app\controllers;

class Product
{
    public function index()
    {
        return 'index';
    }

    public function edit(array $args)
    {
        var_dump($args);
    }
}