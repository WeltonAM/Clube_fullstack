<?php

namespace app\controllers;

class User
{
    public function show($params)
    {
        if(!isset($params['user'])){
            return redirect('/');
        }
        
        $user = findBy('clientes', 'clienteID', $params['user']);
        die();
    }

    public function create()
    {
        return [
            'view' => 'create.php',
            'data' => ['title' => 'Create']
        ];
    }

    public function store()
    {
        $validate = validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|unique:clientes',
            'password' => 'required|maxlen:10',
        ]);

        if(!$validate){
            return redirect('/user/create');
        }

        var_dump($validate);
        die();
    }
}