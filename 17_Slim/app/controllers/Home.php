<?php

namespace app\controllers;

use app\classes\Flash;
use app\database\models\User;
use app\classes\Cache;

class Home extends Base
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index($request, $response)
    {
        // $start = microtime(true);
        
        $users = Cache::get('users');

        if(!$users){
            $users = $this->user->find();
            Cache::set('users', $users);
        }

        // $end = microtime(true);

        // echo($end - $start) / 1000;

        // return $response;

        return $this->getTwig()->render($response, $this->setView('site/home'), [
            'title' => 'Home',
            'users' => $users
        ]);
    }
}