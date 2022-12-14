<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Select implements IBuilder
{
    public function execute($queries)
    {
        if(!$queries['select']){
            throw new \Exception("No select");
        }

        return [
            'query' => "select {$queries['select']} from {$queries['table']}",
        ];
    }
}
