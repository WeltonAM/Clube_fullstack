<?php

namespace Database\Query;

use Database\Query\Execute;
use Database\Query\Interfaces\IBuilder;

class QueryBuilder
{
    protected $queries = [
        'table' => '',
        'select' => '',
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

    public function execute(IBuilder $builder)
    {
        $execute = new Execute;
        $execute->setQuery($this->queries);
        $execute->execute($builder);
    }
}
