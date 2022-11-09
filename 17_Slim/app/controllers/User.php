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
        $email = 'Juju';
        $this->validate->required(['firstName', 'lastName', 'email'])->exist($this->user, 'email', $email);

        $errors = $this->validate->getErrors();

        if($errors){
            FLash::flashes($errors);
            return redirect('/user/create', $response);
        } 
        
        return $response;
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