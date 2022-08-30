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

function limit($limit)
{
    global $query;

    $query['limit'] = true;

    if(isset($query['paginate'])){
        throw new Exception("O Limite não pode ser chamado com o Paginate");
    }

    $query['sql'] = " {$query['sql']} limit {$limit} ";

}

function order($by, $order = 'asc')
{
    global $query;

    if(isset($query['limit'])){
        throw new Exception("O Order não pode vir depois do Limit");
    }

    if(isset($query['paginate'])){
        throw new Exception("O Order não pode vir depois do Paginate");
    }

    $query['sql'] = " {$query['sql']} order by {$by} {$order} ";

}

function paginate($perpage = 10)
{
    global $query;

    if(isset($query['limit'])){
        throw new Exception("O Paginate não pode ser chamada com o Limit");
    }

    $query['paginate'] = true;
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

    // var_dump($query);

    $prepare = $connect->prepare($query['sql']);
    $prepare->execute($query['execute'] ?? []);

    return $prepare->fetchAll();
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