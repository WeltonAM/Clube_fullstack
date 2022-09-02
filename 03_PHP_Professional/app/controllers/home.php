<?php

namespace app\controllers;

class Home 
{
    public function index($params)
    {

        $search = filter_input(INPUT_GET, 's');
        
        read('clientes');

        paginate(5);

        // tableJoin('clienteID', 'email');

        // whereIn('nomecompleto', ['Jone', 'Bob', 'Juliana Karla']);
        
        // if($search){
        //     search(['nomecompleto' => $search, 'cidade' => $search]);
        // }
        
        $users = execute();

        // var_dump($users);
        // die();

        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users, 'links' => render()]
        ];
    }

}