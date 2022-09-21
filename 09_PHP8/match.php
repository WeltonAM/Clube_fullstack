<?php

$name = 'Juliana';

$myName = match($name){
    'Juliana' => 'Juliana',
    'Karla' => ['Karla'],
    'Frô' => function (){
        return 'Frô';
    },
    default => 'undefined',
};

echo $myName;