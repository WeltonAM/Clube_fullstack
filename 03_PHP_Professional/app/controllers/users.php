<?php

namespace app\controllers;

class Users
{
    public function index()
    {

        $users = all('clientes','clienteID,nomecompleto,cidade');

        echo json_encode($users);
    }
}