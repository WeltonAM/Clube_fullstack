<?php

function read($table, $fields = '*')
{
    global $query;

    $query = [];

    $query['read'] = true;
    $query['table'] = $table;
    $query['execute'] = [];

    $query['sql'] = "select {$fields} from {$table} ";
}