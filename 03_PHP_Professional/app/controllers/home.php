<?php

namespace app\controllers;

class Home 
{
    public function index($params): array
    {

        var_dump(delete('clientes', ['clienteID' => 57]));

        $users = all('clientes');
        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users]
        ];
    }

}