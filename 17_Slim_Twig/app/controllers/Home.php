<?php

namespace app\controllers;

use app\classes\Flash;
use app\database\models\User;
use app\classes\Cache;
use app\classes\CacheHtml;

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
        $users = $this->user->setLimit(2)->setCurrentPage()->users();
        $links = $this->user->renderLinks($users['total']);
        
        if(!$users){

            Cache::set('users', $users);
        }

        $cacheHtml = CacheHtml::get('site/home');

        $view = $this->getTwig()->render($response, $this->setView($cacheHtml), [
            'title' => 'Home',
            'users' => $users['registers'],
            'links' => $links,
        ]);

        // $end = microtime(true);

        // echo($end - $start) / 1000;

        return $view;

    }
}