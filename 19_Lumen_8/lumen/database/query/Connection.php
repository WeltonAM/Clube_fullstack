<?php

namespace Database\Query;

use PDO;

class Connection
{
    private static $pdo;

    public static function open()
    {
        if(!static::$pdo){
            try {
                static::$pdo = new PDO("mysql:host=localhost;dbname=curso_lumen",'root', 'root102.',[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);

                return static::$pdo;
            } catch (\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public static function close()
    {

    }
}
