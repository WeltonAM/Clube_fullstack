<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Update implements IBuilder
{
    public function execute($queries)
    {
        if(!$queries['update']){
            throw new \Exception("To update need update");
        }

        if($queries['select']){
            throw new \Exception("Remove select");
        }
        
        if(!$queries['where']){
            throw new \Exception("To update need where");
        }

        return [
            'query' => "update {$queries['table']} set " . implode(',', $queries['update']),
        ];
    }
}