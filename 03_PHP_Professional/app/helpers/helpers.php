<?php 

function arrayIsAssociative($arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}

function isAjax()
{
    return isset($_SERVER['HTTP_HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}