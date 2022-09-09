<?php

namespace app\controllers;

class User
{
    public function show($params)
    {
        if(!isset($params['user'])){
            return redirect('/');
        }
        
        $user = findBy('clientes', 'id', $params['user']);
        die();
    }

    public function edit()
    {
        if(!logged()){
            redirect('/');
        }

        read('clientes', 'clientes.id,nomecompleto,cidade,email,senha,path');
        tableJoin('photos', 'id', 'left');
        where('clientes.id', user()->id);

        $user = execute(isFetchAll:false);

        return [
            'view' => 'edit',
            'data' => ['title' => 'Edit','user' => $user]
        ];
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
        ], persistInputs:true, checkCsrf:true);

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

    public function update($args)
    {

        if(!isset($args['user'])){
            redirect('/');
        }

        $validated = validate([
            'nomecompleto' => 'required',
            'cidade' => 'required',
            'email' => 'required',
        ]);

        if(!$validated){
            redirect('/user/edit/profile');
        }

        $updated = update('clientes', $validated, ['id' => $args['user']]);

        if($updated){
            return setMessageAndRedirect('updated_success', 'Atualizado com sucesso', '/user/edit/profile');
        }
        setMessageAndRedirect('updated_error', 'Ocorreu um erro ao atualizar', '/user/edit/profile');
    }
}