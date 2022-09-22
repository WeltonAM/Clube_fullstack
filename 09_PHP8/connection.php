<?php

require 'connection.php';

use app\database\connection\Connection;

$connection = Connection::connect();
$user = $connection->query("select * from users");
var_dump($users->fetchAll());