<?php

namespace app\controllers;

class Home 
{
    public function index($params)
    {

        $search = filter_input(INPUT_GET, 's');
        
        read('clientes');
        
        // var_dump(http_build_query(['page' => 1, 's' => 'Jone']));
        // die();

        if($search){
            search(['nomecompleto' => $search, 'cidade' => $search]);
        }
        
        paginate(5);

        // tableJoin('id', 'email');

        // whereIn('nomecompleto', ['Jone', 'Bob', 'Juliana Karla']);
        
        
        $users = execute();

        // var_dump($users);
        // die();

        return [
            'view' => 'home',
            'data' => ['title' => 'Home','users' => $users, 'links' => render()]
        ];
    }

}