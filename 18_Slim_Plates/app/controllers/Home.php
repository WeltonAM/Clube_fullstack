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
        ->where('users.id', '>=', 1)
        ->join('posts', 'posts.user_id = users.id')
        ->order('users.id', 'desc')
        ->paginate(3);

        // var_dump($users);
        // die();

        render('site/home', ['users' => $users, 'title' => 'Home']);

        return $response;

    }
}