<?php

namespace app\controllers;

use app\models\User;
use app\classes\Flash;
use app\core\MethodExtract;
use app\models\activerecord\FindBy;

class Login
{
    public string $view;
    public array $data = [];

    public function __construct()
    {
        $methodsToBlock = ['index'];

        $methods = get_class_methods($this);
        [ $actualMethod ] = MethodExtract::extract($this);

        $block = false;

        foreach($methods as $method){
            if(in_array($method, $methodsToBlock) and $method === $actualMethod){
                $block = true;

                return redirect('/');
            }
        }
    }

    public function index()
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

    public function destroy()
    {
        session_destroy();

        return redirect('/');
    }
}