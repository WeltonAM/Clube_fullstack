<?php

namespace app\database\builder;

class UpdateQuery extends Builder
{
    private string $table;
    private array $data = [];

    public static function table(string $table)
    {
        $self = new self;
        $self->table = $table;

        return $self;

    }

    public function set(array $data)
    {
        $this->data = $data;

        return $this;
    }

    private function createQuery()
    {
        if(!$this->table){
            throw new \Exception("Needs to call the table");
        }

        if(!$this->data){
            throw new \Exception("Needs data to update");
        }

        $query = "update {$this->table} set ";

        foreach ($this->data as $field => $value) {
            $query .= "{$field} = :{$field},";
            $this->binds[$field] = $value;
        }

        $query = rtrim($query, ',');

        $query .= !empty($this->where) ? ' where ' . implode(' ', $this->where) : '';

        return $query;
    }

    public function update()
    {
        $query = $this->createQuery();

        try {
            return $this->executeQuery($query, returnExecute:true);
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}