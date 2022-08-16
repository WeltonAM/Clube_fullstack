<?php

namespace app\controllers;

class Login
{
    public function index(){
        return [
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }

    public function store(){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password']);

        if(empty($email) || empty($password)){
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos 1', '/login');
        }
        
        $user = findBy('clientes', 'email', $email);
        
        if(!$user) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos 2', '/login');
        }
        
        if(!password_verify($password, $clientes->senha)){
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos 3', '/login');
        }

        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }

    public function destroy(){
        unset($_SESSION[LOGGED]);
        
        return redirect('/');
    }
}