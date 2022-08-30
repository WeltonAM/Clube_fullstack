<?php

namespace app\controllers;

class Home 
{
    public function index($params)
    {
        // $users = all('clientes');

        read('clientes');
        
        where('clienteID', '>', 5);
        
        order('clienteID');

        // paginate(10);
        
        limit(5);

        
        // orWhere('nomecompleto', '=', 'Raul');

        $users = execute();

        var_dump($users);

        // return [
        //     'view' => 'home',
        //     'data' => ['title' => 'Home','users' => $users]
        // ];
    }

}