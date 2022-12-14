<?php

namespace Database\Query;

class SqlRaw
{
    public static function raw($sql, $queries)
    {
        $sql .= Where::execute($queries);
        $sql .= OrWhere::execute($queries);
        $sql .= Join::execute($queries);
        $sql .= Limit::execute($queries);

        return $sql;
    }
}
