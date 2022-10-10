<?php

namespace app\controllers;

use app\models\User;
use app\classes\Flash;
use app\classes\BlockNotLogged;
use app\models\activerecord\FindBy;
use app\interfaces\ControllerInterface;

class Login implements ControllerInterface
{
    public string $view;
    public array $data = [];

    public function __construct()
    {
        // BlockNotLogged::block($this, ['store']);
    }

    public function index(array $args)
    {
        $this->view = 'login.php';
        $this->data = [
            'title' => 'Login',
        ];
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password']);

        $user = new User;
        $userFound = $user->execute(new FindBy(field:'email', value:$email, fields: 'firstName, lastName, password'));

        if(!$userFound){
            Flash::set('login', 'User invalid');
            return redirect('/login');
        }

        $hash = password_hash($userFound->password, PASSWORD_DEFAULT);
        
        $passwordMatch = password_verify($password, $hash);
        
        if(!$passwordMatch){
            Flash::set('login', 'Password invalid');
            return redirect('/login');
        }

        unset($userFound->password);

        $_SESSION['user'] = $userFound;

        return redirect('/');
    }

    public function destroy(array $args)
    {
        session_destroy();

        return redirect('/');
    }

    public function edit(array $args)
    {

    }

    public function show(array $args)
    {

    }

    public function update(array $args)
    {

    }
}