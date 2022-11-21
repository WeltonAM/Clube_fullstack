<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;

class Login extends Base
{
    private $login;
    
    public function __construct()
    {
        // $this->login = new Login;
    }

    public function index($request, $response)
    {
        $messages = Flash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/login'),[
            'title' => 'Login',
            'messages' => $messages
        ]);
    }

    public function store($request, $response)
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $validate = new Validate;
        $validate->required(['email', 'password'])->email($email);

        $errors = $validate->getErrors();

        if($errors){
            Flash::flashes($errors);
            return redirect('/login', $response);
        }

        $logged = $this->login->login($email, $password);

        if($logged){
            return redirect('/', $response);
        }

        Flash::set('message', 'Error to log in.');
        return redirect('/login', $response);
    }
}