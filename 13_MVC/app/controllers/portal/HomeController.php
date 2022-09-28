<?php

namespace app\controllers\portal;

use app\models\portal\User;
use app\classes\controllers\ContainerController;

class HomeController extends ContainerController
{
    public function index()
    {
        $user = new User;
        $users = $user->all();

        $this->view([
            'title' => 'Users list',
            'users' => $users,
        ], 'portal.home');
    }
}