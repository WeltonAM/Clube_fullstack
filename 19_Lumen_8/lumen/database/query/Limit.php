<?php

namespace Database\Query;

class Limit
{
    public static function execute($queries)
    {
        if(!$queries['limit']){
            throw new \Exception("No limit in the query");
        }

        return ' limit ' . $queries['limit'];
    }
}
