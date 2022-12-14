<?php

namespace Database\Query;

use Database\Query\Execute;
use Database\Query\Interfaces\IBuilder;

class QueryBuilder
{
    protected $queries = [
        'table' => '',
        'select' => '',
        'limit' => '',
        'join' => [],
        'where' => [],
        'binds' => [],
        'orWhere' => [],
    ];

    public function select($fields = '*')
    {
        $this->queries['select'] = $fields;

        return $this;
    }

    public function table($table)
    {
        $this->queries['table'] = $table;

        return $this;
    }

    public function limit($limit)
    {
        $this->queries['limit'] = $limit;

        return $this;
    }

    public function join($table, $foreignKey)
    {
        $this->queries['join'][] = " inner join {$table} on {$table}.id = {$this->queries['table']}.{$foreignKey}";

        return $this;
    }

    public function where(...$args)
    {
        $numArgs = count($args);
        if($numArgs <= 1 || $numArgs > 3){
            throw new \Exception("Exceeding number of args.");
        }

        $operator = "=";

        if($numArgs == 2){
            list($field, $value) = $args;
        } else {
            list($field, $operator, $value) = $args;
        }

        $this->queries['binds'][] = $value;

        $this->queries['where'][] = "{$field} {$operator} ?";

        return $this;
    }

    public function orWhere(...$args)
    {
        $numArgs = count($args);
        if($numArgs <= 1 || $numArgs > 3){
            throw new \Exception("Exceeding number of args.");
        }

        $operator = "=";

        if($numArgs == 2){
            list($field, $value) = $args;
        } else {
            list($field, $operator, $value) = $args;
        }

        $this->queries['binds'][] = $value;

        $this->queries['orWhere'][] = "{$field} {$operator} ?";

        return $this;
    }

    public function execute(IBuilder $builder)
    {
        $execute = new Execute;
        $execute->setQuery($this->queries);
        $execute->execute($builder);
    }
}
