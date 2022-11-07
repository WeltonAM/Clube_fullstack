<?php

namespace app\database\models;

use app\database\Connection;

abstract class Base
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::connection();   
    }

    public function findAll()
    {
        try {
            $query = $this->connection->query("select * from " . $this->table);
            return $query->fetchAll();
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}