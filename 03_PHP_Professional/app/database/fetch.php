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

// function where($field, $operator, $value)
function where()
{
    global $query;

    $args = func_get_args();
    $numArgs = func_num_args();

    if(!isset($query['read'])){
        throw new Exception("Antes de chamar o where chame o read");
    }

    if($numArgs < 2 || $numArgs > 3){
        throw new Exception("O where pracisa de 2 ou 3 parâmetros");
    }

    if($numArgs === 2){
        $field = $args[0];
        $operator = '=';
        $value = $args[1];
    } else {
        $field = $args[0];
        $operator = $args[1];
        $value = $args[2];
    }
    
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = " {$query['sql']} where {$field} {$operator} :{$field} ";
}



// function orWhere($field, $operator, $value, $typeWhere = 'or')
function orWhere()
{
    global $query;

    $args = func_get_args();
    $numArgs = func_num_args();


    if(!isset($query['read'])){
        throw new Exception("Antes de chamar o Where chame o Read");
    }

    if(!isset($query['where'])){
        throw new Exception("Antes de chamar o OrWhere chame o Where");
    }

    if($numArgs < 2 || $numArgs > 4){
        throw new Exception("O where pracisa de 2 ou 4 parâmetros");
    }

    if($numArgs === 2){
        $field = $args[0];
        $operator = '=';
        $value = $args[1];
        $typeWhere = 'or';
    } elseif($numArgs === 3) {
        $operators = ['=', '<', '>', '!==', '<=', '>='];
        
        $field = $args[0];
        $operator = in_array($args[1], $operators) ? $args[1] : '=';
        $value = in_array($args[1], $operators) ? $args[2] : $args[1];
        $typeWhere = $args[2] === 'and' ? 'and' : 'or';
    } else {
        $field = $args[0];
        $operator = $args[1];
        $value = $args[2];
        $typeWhere = $args[3];
    }

    // var_dump([$field => $value]);
    
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