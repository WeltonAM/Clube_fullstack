<?php


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