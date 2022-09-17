<?php

namespace app\models;

class User extends Model
{
    public $table = 'users';
    
    public function allUsersWithIsAdmin()
    {
        return 'Admin';
    }
}