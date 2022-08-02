<?php

$data = ['Juliana', 'Karla', 'Flor', 12, true];

// print_r($data);
// var_dump($data);
// echo $data[2];

// array_push($data, 'last'); No FINAL do array
// array_unshift($data, 'first'); Add no COMEÇO do array

// var_dump($data);

$person = [
    'name' => 'Juliana', 
    'age' => 27, 
    'documents' => [
        'cpf' => '0000000000', 
        'rg' => '0000000000'
    ]
];

var_dump($person['documents']['cpf']);