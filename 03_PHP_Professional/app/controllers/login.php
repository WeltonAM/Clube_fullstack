<?php

namespace app\controllers;

class Login
{
    public function index(){
        return [
            'view' => 'login',
            'data' => ['title' => 'Login']
        ];
    }

    public function store(){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password']);

        if(empty($email) || empty($password)){
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }
        
        // $user = findBy('clientes', 'email', $email);

        read('clientes', 'clientes.id,nomecompleto,cidade,email,senha,path');
        tableJoin('photos', 'id', 'left');
        where('email', $email);

        $user = execute(isFetchAll:false);

        
        if(!$user) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }
        
        if(password_verify($password, $user->senha)){
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }

        unset($user->senha);

        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }

    public function destroy(){
        unset($_SESSION[LOGGED]);
        
        return redirect('/');
    }
}