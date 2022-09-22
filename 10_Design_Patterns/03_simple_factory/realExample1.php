<?php

interface LoginFactoryInterface{
    public function log($email, $password);
}

class LoginFactory
{
    public static function make($type) // single responsibility principle 
    {
        switch($type){
            case 'admin':
                return new Admin;
                break;
            case 'user':
                return new User;
                break;
            case 'employee':
                return new Employee;
                break;
            default:
            throw new Exception("The class doesn't exist.");
        }
    } 
}

class Admin implements LoginFactoryInterface
{
    public function log($email, $password)
    {
        return 'Login as admin';
    }
}

class User implements LoginFactoryInterface
{
    public function log($email, $password)
    {
        return 'Login as user';
        
    }
}

class Employee implements LoginFactoryInterface
{
    public function log($email, $password)
    {
        return 'Login as employee';

    }
}

$loginInstance = LoginFactory::make('user');
var_dump($loginInstance->log('ju@hta.com', '123'));