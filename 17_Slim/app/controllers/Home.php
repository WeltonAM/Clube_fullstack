<?php

namespace app\controllers;

use app\classes\Flash;
use app\classes\Validate;
use app\database\models\User;

class Home extends Base
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
        $this->validate = new Validate;
    }

    public function index($request, $response)
    {
        $users = $this->user->find();

        $this->validate->exists(['firstName', 'email', 'password'])->email($this->user, 'email', 'Juju');

        var_dump($this->validate->getErrors());
        die();

        return $this->getTwig()->render($response, $this->setView('site/home'), [
            'title' => 'Home',
            'users' => $users
        ]);
    }
}