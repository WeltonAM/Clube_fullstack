<?php

namespace app\models;

use PDO;

class Connection
{
    public function connect()
    {

        $config = Bind::get('config');
        
        $pdo = new PDO("mysql:host=$config->host;dbname=$config->dbname;charset=$config->charset", $config->name, $config->password, $config->options);


        return $pdo;
    }
}