<?php

namespace app\database;

use PDO;

class Connection
{
    private static $pdo;

    public static function connection()
    {
        if(static::$pdo) return static::$pdo;

        try {
            static::$pdo = new PDO('mysql:host=localhost;dbname=slim4', 'root', 'root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);

            return static::$pdo;

        } catch (\PDOException $th) {
            var_dump($th->getMessage());
        }
    }
}