<?php

namespace app\controllers;

use app\database\builder\InsertQuery;
use app\database\models\User;
use app\database\builder\ReadQuery;

class Home
{
    public function index($request, $response)
    {
        // $users = ReadQuery::select('users.id, firstName, lastName')
        // ->from('users')
        // ->paginate(3);

        $created = InsertQuery::into('users')->insert([
            'firstName' => 'Mark',
            'lastName' => 'Zegarelli',
            'email' => 'mar@k.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
        ]);

        // render('site/home', ['users' => $users, 'title' => 'Home']);

        return $response;

    }
}