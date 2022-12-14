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
        $this->queries['join'][$foreignKey] = " inner join {$table} on {$table}.id = {$this->queries['table']}.{$foreignKey}";

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

        $fieldWhere = ":{$field}";

        $this->queries['binds'][$fieldWhere] = $value;

        $this->queries['where'][$field] = "{$field} {$operator} {$fieldWhere}";

        return $this;
    }

    public function execute(IBuilder $builder)
    {
        $execute = new Execute;
        $execute->setQuery($this->queries);
        $execute->execute($builder);
    }
}
