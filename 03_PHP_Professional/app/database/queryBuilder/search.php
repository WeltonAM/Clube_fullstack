<?php

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