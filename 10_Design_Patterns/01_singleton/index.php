<?php

// require "app/Connection.php";
require "app/Counter.php";
require "app/Log.php";

require "helpers/database.php";

// use app\Connection;
use app\Counter;
use app\Log;

// Counter::addCounter(10);
// var_dump(Counter::getCounter());
// echo '<br />';
// echo '<br />';

// $instance1 = Connection::getInstance();
// var_dump(Connection::getInstance());
// echo '<br />';
// echo '<br />';

// $instance2 = Connection::getInstance();
// var_dump($instance1 === $instance2);
// echo '<br />';
// echo '<br />';

$instance1 = create();

$instance2 = update();

var_dump($instance1);
echo '<br />';
echo '<br />';

var_dump($instance2);