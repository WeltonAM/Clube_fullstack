<?php

namespace app\Models;

use PDO;

class Connection
{
    public static function connect()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=laravel_ale", "root", "root102.");

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}