<?php

namespace app\controllers;

use app\classes\Flash;
use app\database\models\User;

class Home
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response)
    {

        $users = $this->user->find();

        $message = Flash::get('message');

        render('site/home', ['users' => $users]);

        return $response;

    }
}