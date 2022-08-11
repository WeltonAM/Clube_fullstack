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
}