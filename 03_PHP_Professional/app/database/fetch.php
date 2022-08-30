<?php

// Query Builder
$query = [];

function read($table, $fields = '*')
{
    global $query;

    $query['read'] = true;
    $query['execute'] = [];

    $query['sql'] = "select {$fields} from {$table} ";
}

function where($field, $operator, $value)
{
    global $query;

    if(!isset($query['read'])){
        throw new Exception("Antes de chamar o where chame o read");
    }

    if(func_num_args() !== 3){
        throw new Exception("O where pracisa de 3 parâmetros");
    }
    
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = " {$query['sql']} where {$field} {$operator} :{$field} ";
}

function orWhere($field, $operator, $value, $typeWhere = 'or')
{
    global $query;

    if(!isset($query['read'])){
        throw new Exception("Antes de chamar o Where chame o Read");
    }

    if(!isset($query['where'])){
        throw new Exception("Antes de chamar o OrWhere chame o Where");
    }

    if(func_num_args() < 3 || func_num_args() > 4){
        throw new Exception("O where pracisa de 3 ou 4 parâmetros");
    }
    
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = " {$query['sql']} {$typeWhere} {$field} {$operator} :{$field} ";
}

function execute()
{
    global $query;

    $connect = connect();
    // $prepare = $connect->prepare($query['sql']);
    // $prepare->execute($query['execute'] ?? []);

    // return $prepare->fetchAll();

    var_dump($query);
}

// Complete query
function all($table, $fields = '*'){
    try {
        $connect = connect();

        $query = $connect->query("select {$fields} from {$table}");
        return $query->fetchAll();
    } catch (\PDOException $e) {
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $value, $fields = '*')
{
    try {
        $connect = connect();
        $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
        $prepare->execute([
            $field => $value
        ]);
        return $prepare->fetchObject();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}