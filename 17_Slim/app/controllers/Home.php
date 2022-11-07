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
        $users = $this->user->findAll();

        var_dump($users);
        die();

        return $this->getTwig()->render($response, $this->setView('site/home'), [
            'title' => 'Home',
        ]);
    }
}