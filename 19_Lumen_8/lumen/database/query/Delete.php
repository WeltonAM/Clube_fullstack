<?php

namespace Database\Query;

use Database\Query\Interfaces\IBuilder;

class Delete implements IBuilder
{
    public function execute($queries)
    {
        if($queries['select']){
            throw new \Exception("Remove select");
        }
        
        if(!$queries['where']){
            throw new \Exception("To update need where");
        }

        return [
            'query' => "delete from {$queries['table']}",
        ];
    }
}