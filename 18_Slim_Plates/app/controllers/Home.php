<?php

namespace app\controllers;

;
use app\database\models\User;
use app\database\builder\Query;

class Home
{
    public function index($request, $response)
    {
        $users = Query::select('users.id, firstName, lastName')
        ->from('users')
        ->paginate(3);
        
        render('site/home', ['users' => $users, 'title' => 'Home']);

        return $response;

    }
}