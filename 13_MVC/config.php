<?php

return [
    "database" => [
        'host' => 'localhost',
        'dbname' => 'curso_mvc',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'options' => [
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ
        ],
    ],

    "email" => [ // example of more configs
        ''
    ],
];
