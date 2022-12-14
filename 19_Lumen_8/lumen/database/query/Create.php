<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Create implements IBuilder
{
    public function execute($queries)
    {
        if(!$queries['create']){
            throw new \Exception("No create");
        }

        return [
            'query' => "insert into {$queries['table']} (" . implode(',', array_keys($queries['create'])) . ') values (' . implode(',', array_values($queries['create'])) . ')', 
        ];
    }
}