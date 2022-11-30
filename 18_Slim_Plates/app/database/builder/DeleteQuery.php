<?php

namespace app\database\builder;

class DeleteQuery extends Builder
{
    private string $table;

    public static function table(string $table)
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

        $query = "delete from {$this->table} ";
        $query .= !empty($this->where) ? ' where ' . implode(' ', $this->where) : '';

        return $query;
    }

    public function delete()
    {
        $query = $this->createQuery();

        try {
            return $this->executeQuery($query, returnExecute:true);
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}