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
            'view' => 'create',
            'data' => ['title' => 'Create']
        ];
    }

    public function store()
    {
        $validate = validate([
            'nomecompleto' => 'required',
            'cidade' => 'required',
            'email' => 'email|unique:clientes',
            'senha' => 'required|maxlen:10',
        ], persistInputs:true);

        if(!$validate){
            return redirect('/user/create');
        }

        // $validate['senha'] = password_hash($validate['senha'], PASSWORD_DEFAULT);

        $created = create('clientes', $validate);
        
        if(!$created){
            setFlash('message', 'Ocorreu um erro ao cadastrar. Tente novamente!');
            return redirect('/user/create');
        }

        return redirect('/');
    }
}