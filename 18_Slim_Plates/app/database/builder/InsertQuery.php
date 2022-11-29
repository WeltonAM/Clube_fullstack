<?php

namespace app\database\builder;

use app\database\Connection;

class InsertQuery
{
    private string $table;
    private array $data = [];

    public static function into(string $table)
    {
        $self = new self;
        $self->table = $table;
        
        return $self;
    }

    private function createQuery()
    {
        if(!$this->table){
            throw new \Exception("Needs to call the table");
        }

        if(!$this->data){
            throw new \Exception("Needs data to singup");
        }

        $query = "insert into {$this->table}(";
        $query .= implode(',', array_keys($this->data)). ') VALUES(';
        $query .= ':' . implode(',:', array_keys($this->data)).')';

        return $query;
    }
    
    private function executeQuery($query)
    {
        $connection = Connection::getConnection();
        $prepare = $connection->prepare($query);

        return $prepare->execute($this->data);
    }

    public function insert(array $data)
    {
        $this->data = $data;

        $query = $this->createQuery();

        try {
            return $this->executeQuery($query);
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}