<?php

function limit($limit)
{
    global $query;

    $query['limit'] = true;

    if(isset($query['paginate'])){
        throw new Exception("O Limite não pode ser chamado com o Paginate");
    }

    $query['sql'] = " {$query['sql']} limit {$limit} ";
}
