<?php

use doctrine\inflector\InflectorFactory;

function fieldFK($table, $field)
{
    $inflector = InflectorFactory::create()->build();
    $tableToSingular = $inflector->singularize($table);

    return $tableToSingular.ucfirst($field);
}

function tableJoin($table, $fieldFK, $typeJoin = 'inner')
{
    global $query;

    if(isset($query['where'])){
        throw new Exception("Não pode chamar where antes do join");
    }

    $fkToJoin = fieldFK($query['table'], $fieldFK);
    $query['sql'] = "{$query['sql']} {$typeJoin} join {$table} on {$table}.{$fkToJoin} = {$query['table']}.{$fieldFK}";
}

function tableJoinWithFK($table, $fieldFK, $typeJoin = 'inner')
{
    global $query;

    if(isset($query['where'])){
        throw new Exception("Não pode chamar where antes do join");
    }

    $fkToJoin = fieldFK($table, $fieldFK);
    $query['sql'] = "{$query['sql']} {$typeJoin} join {$table} on {$table}.{$fieldFK} = {$query['table']}.{$fkToJoin}";
}