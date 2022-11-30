<?php

namespace app\controllers;

use app\database\models\User;
use app\database\builder\ReadQuery;
use app\database\builder\DeleteQuery;
use app\database\builder\InsertQuery;
use app\database\builder\UpdateQuery;

class Home
{
    public function index($request, $response)
    {
        $search = $_GET['s'] ?? '';

        $users = ReadQuery::select('users.id, firstName, lastName')
        ->from('users')
        ->where('firstName', 'like', "%{$search}%")
        ->paginate(3);

        // $updated = UpdateQuery::table('users')->set([
        //     'firstName' => 'Poco',
        //     'lastName' => 'Yoyo'
        // ])->where('id', '=', 18)->update();

        // $deleted = DeleteQuery::table('users')->where('id', '=', 16)->delete();

        // $created = InsertQuery::into('users')->insert([
        //     'firstName' => 'Poco',
        //     'lastName' => 'Yo',
        //     'email' => 'poc@yo.com',
        //     'password' => password_hash('123', PASSWORD_DEFAULT),
        // ]);

        render('site/home', ['users' => $users, 'title' => 'Home']);

        return $response;

    }
}