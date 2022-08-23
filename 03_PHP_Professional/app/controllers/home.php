<?php

namespace app\controllers;

class Home 
{
    public function index($params): array
    {
        $users = all('clientes');
        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users]
        ];
    }

}