<?php

use doctrine\inflector\InflectorFactory;

// Query Builder
$query = [];

function read($table, $fields = '*')
{
    global $query;

    $query = [];

    $query['read'] = true;
    $query['table'] = $table;
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

function paginate($perPage = 10)
{
    global $query;

    if(isset($query['limit'])){
        throw new Exception("O Paginate não pode ser chamada com o Limit");
    }

    $rowCount = execute(rowCount:true);

    $page = filter_input(INPUT_GET, 'page',);

    $page = $page ?? 1;

    $query['currentPage'] = (int)$page;

    $query['pageCount'] = (int)ceil($rowCount / $perPage);
    $offSet = ($page - 1) * $perPage;

    $query['paginate'] = true;

    $query['sql'] = "{$query['sql']} limit {$perPage} offset {$offSet}";

    // var_dump($query);
    // die();
}

function render()
{

    global $query;

    $pageCount = $query['pageCount'];
    $currentPage = $query['currentPage'];
    $maxLinks = 2;

    $links = '<ul class="pagination">';
    $active = '';
    for ($i=$currentPage - $maxLinks; $i <= $currentPage + $maxLinks ; $i++) { 
        // $page = "?page={$i}";
        if($i > 0 && $i <= $pageCount){
            $active = $currentPage === $i ? 'active' : '';
            $linkPage = http_build_query(array_merge($_GET,['page' => $i]));
            $links .= "<li class='page-item {$active}'><a href='?{$linkPage}' class='page-link'>{$i}</a></li>";
        }
    }
    $links .= '</ul>';

    return $links;
}

// function where($field, $operator, $value)
function where()
{
    global $query;

    if(isset($query['where'])){
        throw new Exception("Verifique quantos 'Where' estão sendo chamados");
    }

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

function whereIn($field, $data)
{
    global $query;

    if(isset($query['where'])){
        throw new Exception("Não pode chamar Where com a WhereIn");
    }

    $query['where'] = true;

    $query['sql'] = "{$query['sql']} where {$field} in (".'\''.implode('\',\'', $data).'\''.')';
}

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

function search($search){
    global $query;

    if(isset($query['where'])){
        throw new Exception("Não pode chamar o Where na busca");
    }

    if(!arrayIsAssociative($search)){
        throw new Exception("O array tem que ser associativo na Busca");
    }

    $sql = "{$query['sql']} where ";

    $execute = [];
    foreach($search as $field => $searched){
        $sql.= "{$field} like :{$field} or ";
        $execute[$field] = "%{$searched}%";
    }

    $sql = rtrim($sql, ' or ');

    $query['sql'] = $sql;
    $query['execute'] = $execute;

}

function execute($isFatchAll = true, $rowCount = false)
{
    global $query;

    // var_dump($query);
    // die();

    try {
        $connect = connect();

        if(!isset($query['sql'])){
            throw new Exception("Precisa ter o SQL para executar a Query");
        }
    
        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if($rowCount){
            return $prepare->rowCount();
        }
    
        return $isFatchAll ? $prepare->fetchAll() : $prepare->fetch();

    } catch (Exception $e) {
        $error = [
          'file' => $e->getFile(),  
          'line' => $e->getLine(),  
          'message' => $e->getMessage(),  
          'sql' => $query['sql'],  
        ];
        ddd($error);
    }

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