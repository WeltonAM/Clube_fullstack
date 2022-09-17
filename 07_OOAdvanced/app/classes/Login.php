<?php

namespace app\classes;

class Login
{
    public $email;
    public $password;

    public function auth()
    {
        return "The email is {$this->email} and the password {$this->password}";
    }
}