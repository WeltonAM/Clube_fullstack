<?php

function load()
{
    $page = filter_input(INPUT_GET, strip_tags('page'));

    $page = (!$page) ? "pages/home.php" : "pages/{$page}.php";

    if(!file_exists($page)){
        throw new Exception("Error Processing Request", 1);
    }

    return $page;
}
