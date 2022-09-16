<?php

class Person
{
    public $age;
    public $name;
    public $email;

    public function data()
    {
        return "My name is {$this->name}, my age is {$this->age} and my email is {$this->email}.\n";
    }
}

