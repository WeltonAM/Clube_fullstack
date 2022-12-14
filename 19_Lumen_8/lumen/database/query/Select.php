<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Select implements IBuilder
{
    private $fetchAll;

    public function __construct($fetchAll = true)
    {
        $this->fetchAll = $fetchAll;
    }

    public function execute($queries)
    {
        if(!$queries['select']){
            throw new \Exception("No select");
        }

        return [
            'query' => "select {$queries['select']} from {$queries['table']}",
            'fetchAll' => $this->fetchAll
        ];
    }
}
