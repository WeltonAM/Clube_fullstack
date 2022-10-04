<?php

namespace app\controllers;

use app\models\User as UserModel;
use app\models\activerecord\FindBy;

class User
{
    public string $view;
    public array $data = [];

    public function show(array $args)
    {

        $user = (new UserModel)->execute(new FindBy(field:'id', value:$args[0], fields:'id, firstName, lastName'));

        if(!$user){
            throw new \Exception("User not found");
        }

        $this->view = 'user.php';
        $this->data = [
            'title' => 'Users data',
            'user' => $user
        ];
    }
}