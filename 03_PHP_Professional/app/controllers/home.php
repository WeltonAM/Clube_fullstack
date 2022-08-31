<?php

namespace app\controllers;

class Home 
{
    public function index($params)
    {
        // $users = all('clientes');

        read('clientes');
        
        // where('clienteID', 7);

        // orWhere('estadoID', '=', '27', 'and');
        
        // order('clienteID');

        // paginate(10);
        
        // limit(5);

        $users = execute();

        var_dump($users);

        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users]
        ];
    }

}