<?php

// Query Builder
$query = [];

function read()
{
    global $query;

    $query['sql'] = "select * from clientes ";
}

function where()
{
    global $query;
    
    $query['where'] = true;
    $query['sql'] = " {$query['sql']} where ";
}

function orWhere()
{
    global $query;
    
    if(!isset($query['where'])){
        throw new Exception("Precisa execcutar o Where antes do or Where");
    }

    $query['sql'] = "{$query['sql']} or ";
}

// function search()
// {

// }

// function paginate()
// {

// }

// function limit()
// {

// }

// function order()
// {

// }

function execute()
{
    global $query;

    // $connect = connect();
    // $prepare = $connect->prepare($query['sql']);
    // $prepare->execute();

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