<?php

namespace app\controllers;

use app\database\models\User;

class Home extends Base
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response)
    {
        $users = $this->user->find();
    
        $created = $this->user->create(['firstName' => 'asas', 'email' => 'asasas']);

        var_dump($created);
        die();

        return $this->getTwig()->render($response, $this->setView('site/home'), [
            'title' => 'Home',
            'users' => $users,
        ]);
    }
}