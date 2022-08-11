<?php

function connect()
{
    return new PDO("mysql:host=localhost;dbname=andes", 'root', '12Nas89.', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}