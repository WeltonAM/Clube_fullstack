<?php

namespace app\classes;

class Routes
{
    public static function load($routes, $uri)
    {
        if(!array_key_exists($uri, $routes)){
            throw new \Exception("Route doesn't exist");
        }
        
        return "../app/{$routes[$uri]}";
    }
}