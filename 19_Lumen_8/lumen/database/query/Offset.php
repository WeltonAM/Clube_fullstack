<?php

namespace Database\Query;

class offset
{
    public static function execute($queries)
    {
        if(!$queries['offset']){
            return;
        }

        return 'offset ' . $queries['offset'];
    }
}