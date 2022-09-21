<?php

class User
{
    public function __construct(private $name, private $age)
    {
    }

    public function info()
    {
        return $this->name;
    }
}

$user = new User('Juliana', 27);
echo $user->info();