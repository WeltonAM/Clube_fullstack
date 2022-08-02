<?php 

function test($name)
{
    $person = function() use ($name){
        return $name;
    }; // funções anônimas precisam de ; no final

    return $person;
}

var_dump(test('Juliana')());