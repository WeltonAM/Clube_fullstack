<?php

function connect(){
    $pdo = new \PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '12Nas89.');

    $pdo->setAttribute(POD::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(POD::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

function create(){

}

function update(){

}

function find(){

}

function delete(){

}