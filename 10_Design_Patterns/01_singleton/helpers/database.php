<?php

require "app/Connection.php";

use app\Connection;

function create()
{
    $instance = Connection::getInstance();

    return $instance;
}

function update()
{
    $instance = Connection::getInstance();
    
    return $instance;
}