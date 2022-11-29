<?php

namespace app\database\builder;

class InsertQuery extends Builder
{
    private string $table;

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

        if(!$this->binds){
            throw new \Exception("Needs data to singup");
        }

        $query = "insert into {$this->table}(";
        $query .= implode(',', array_keys($this->binds)). ') VALUES(';
        $query .= ':' . implode(',:', array_keys($this->binds)).')';

        return $query;
    }

    public function insert(array $data)
    {
        $this->binds = $data;

        $query = $this->createQuery();

        try {
            return $this->executeQuery($query);
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}