<?php

namespace app\database\builder;

use app\database\Connection;

class Query
{
    private ?string $table = null;
    private ?string $fields = null;
    private string $order;
    private string $group;
    private array $where = [];
    private array $binds = [];
    private array $join = [];

    public static function select(string $fields = '*')
    {
        $self = new Self;
        $self->fields = $fields;

        return $self;
    }

    public function from(string $table)
    {
        $this->table = $table;
        
        return $this;
    }

    public function where(string $field, string $operator, string|int $value, ?string $logic = null)
    {
        $fieldPlaceholder = $field;

        if(str_contains($fieldPlaceholder, '.')){
            $fieldPlaceholder = str_replace('.', '', $fieldPlaceholder);
        }

        $this->where[] = "{$field} {$operator} :{$fieldPlaceholder} {$logic} ";

        $this->binds[$fieldPlaceholder] = $value; 
        
        return $this;
    }

    public function order(string $field, string $value)
    {
        $this->order = " order by {$field} {$value}";

        return $this;
    }

    public function group(string $field)
    {
        $this->group = " group by {$field}";

        return $this;
    }

    public function join(string $foreignTable, string $logic, string $type = 'inner')
    {
        $this->join[] = " {$type} join {$foreignTable} on {$logic}";

        return $this;
    }

    public function createQuery()
    {
        if(!$this->fields){
            throw new \Exception("Needs to call the select");
        }

        if(!$this->table){
            throw new \Exception("Needs to call the table");
        }

        $query = "select ";
        $query .= $this->fields. " from ";
        $query .= $this->table;
        $query .= (isset($this->join)) ? implode(' ', $this->join) : '';
        $query .= (isset($this->where)) ? ' where ' . implode(' ', $this->where) : '';
        $query .= $this->group ?? '';
        $query .= $this->order ?? '';

        return $query;
    }

    public function get()
    {
        $query = $this->createQuery();

        try {

            $connection = Connection::getConnection();
            $prepare = $connection->prepare($query);
            $prepare->execute($this->binds ?? []);

            return $prepare->fetchAll();
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function first()
    {
        $query = $this->createQuery();

        try {

            $connection = Connection::getConnection();
            $prepare = $connection->prepare($query);
            $prepare->execute($this->binds ?? []);

            return $prepare->fetchObject();
            
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}