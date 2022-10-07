<?php

namespace app\classes;

class BlockPostRequest
{
    public static function block()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo "Stop! You can't do it | <a href='/'>Home</a>";
            die();
        }
    }
}