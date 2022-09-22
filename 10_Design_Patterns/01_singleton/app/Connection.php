<?php

namespace app;

use PDO;

class Connection
{
    protected static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new PDO("mysql:host=localhost;dbname=loja", "root", "root");
        }
        return self::$instance; // return the self instance 
    }
}