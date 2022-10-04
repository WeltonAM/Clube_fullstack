<?php

namespace app\controllers;

class Login
{
    public string $view;
    public array $data = [];

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
    }
}