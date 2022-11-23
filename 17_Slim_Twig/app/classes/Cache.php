<?php

namespace app\classes;

class Cache
{
    private static string $folderCache = '../app/cache/';

    private static int $expireInSeconds = 10;

    public static function set($file, $data)
    {
        $file = static::$folderCache.$file.'_cache.txt';
        
        if(!file_exists($file) || time() - filemtime($file) > static::$expireInSeconds){
            file_put_contents($file, json_encode($data));
        }
    }
    
    public static function get($file)
    {
        $file = static::$folderCache.$file.'_cache.txt';
        
        if(file_exists($file)){
            if(time() - filemtime($file) > static::$expireInSeconds){
                return json_decode(file_get_contents($file));
            }

            return false;
        }

    }
}