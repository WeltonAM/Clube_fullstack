<?php

function load()
{

    if(isset($_GET['page']))
    {
        $page = strip_tags($_GET['page']);
        $page = "pages/{$page}.php";
    } else 
    {
       $page = "pages/home.php";
    }

    if(!file_exists($page))
    {
        throw new \Exception("Error Processing Request");
    }

    return $page;
}