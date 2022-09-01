<?php

namespace app\controllers;

class Home 
{
    public function index($params)
    {

        $search = filter_input(INPUT_GET, 's');
        
        read('clientes');
        
        if($search){
            search(['nomecompleto' => $search, 'cidade' => $search]);
        }
        
        $users = execute();

        // var_dump($users);
        // die();

        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users]
        ];
    }

}