<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Login as Log;
use app\classes\Validate;

class Login
{
    private $login;
    
    public function __construct()
    {
        $this->login = new Log;
    }

    public function index($request, $response)
    {
        render('site/login', ['title' => 'Login']);

        return $response;
    }

    public function store($request, $response)
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $validate = new Validate;
        $validate->required(['email', 'password'])->email($email);

        $errors = $validate->getErrors();

        if($errors){
            return redirect('/login', $response);
        }

        $logged = $this->login->login($email, $password);

        if($logged){
            return redirect('/', $response);
        }

        Flash::set('message', 'Error to log in.');
        return redirect('/login', $response);
    }

    public function destroy($request, $response)
    {
        $this->login->logout();

        return redirect('/', $response);
    }
}