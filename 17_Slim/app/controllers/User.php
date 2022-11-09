<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;
use app\database\models\User as ModelUser;

class User extends Base
{
    private $validate;
    private $user;

    public function __construct()
    {
        $this->validate = new Validate;
        $this->user = new ModelUser;
    }

    public function create($request, $response, $args)
    {
        $messages = FLash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/user_create'), [
            'title' => 'Sign up',
            'messages' => $messages,
        ]);
    }

    public function store($request, $response, $args)
    {
        $firstName = strip_tags($_POST['firstName']);
        $lastName = strip_tags($_POST['lastName']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = strip_tags($_POST['password']);

        $this->validate->required(['firstName', 'lastName', 'email', 'password'])->exist($this->user, 'email', $email);

        $errors = $this->validate->getErrors();

        if($errors){
            FLash::flashes($errors);
            return redirect('/user/create', $response);
        }
        
        $created = $this->user->create(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

        if($created){
            Flash::set('message', 'Sing up successfully');
            return redirect('/', $response);
        }
        
        Flash::set('message', 'Something went wrong');
        return redirect('/user/create', $response);
        
    }

    public function update($request, $response, $args)
    {
        var_dump('update');
        return $response;
    }

    public function destroy($request, $response, $args)
    {
        var_dump('delete');
        return $response;
    }
}