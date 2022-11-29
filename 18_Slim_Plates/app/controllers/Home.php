<?php

namespace app\controllers;

use app\database\models\User;
use app\database\builder\ReadQuery;
use app\database\builder\InsertQuery;
use app\database\builder\UpdateQuery;

class Home
{
    public function index($request, $response)
    {
        // $users = ReadQuery::select('users.id, firstName, lastName')
        // ->from('users')
        // ->paginate(3);

        $updated = UpdateQuery::table('users')->set([
            'firstName' => 'Markin',
            'lastName' => 'Twin'
        ])->where('id', '=', 17)->update();

        // $created = InsertQuery::into('users')->insert([
        //     'firstName' => 'Mark',
        //     'lastName' => 'Zegarelli',
        //     'email' => 'mar@k.com',
        //     'password' => password_hash('123', PASSWORD_DEFAULT),
        // ]);

        // render('site/home', ['users' => $users, 'title' => 'Home']);

        return $response;

    }
}