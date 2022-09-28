<?php

namespace app\classes;

class Bind
{
    private static $bind = [];

    public static function set($name, $value)
    {
        if(!isset(static::$bind[$name])){
            static::$bind[$name] = $value;
        }        
    }

    public static function get()
    {
        if(!isset(static::$bind[$name])){
            throw new Exception("This indice doesn't exist inside BIND: {$name}");
        }     
        
        return (object)static::$bind[$name];
        
    }
}