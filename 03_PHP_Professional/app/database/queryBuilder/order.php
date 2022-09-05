<?php

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