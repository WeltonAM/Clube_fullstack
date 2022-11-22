<?php

namespace app\classes;

use FastRoute\RouteParser\StdTest;

class CacheHtml
{
    private static string $folderCacheViews = '../app/views/cache/';
    private static string $folderViews = '../app/views/';
    private static int $expireInSeconds = 10;

    public static function set($html, $data)
    {
        $file = static::$folderCacheViews.$html.'_cache.txt';
        
        $view = static::$folderViews.$html.'.html';

        if(!file_exists($view)){
            die("View {$view} doesn't exist");
        }
        
        if(!file_exists($file) || time() - filemtime($file) > static::$expireInSeconds){
            file_put_contents($file, $data);
        } 
    }
    
    public static function get($html)
    {
        $file = static::$folderCacheViews.$html.'_cache.html';

        if(!file_exists($file) || time() - filemtime($file) > static::$expireInSeconds){
            return $html;
        }

        return "/cache/{$html}_cache";

        // return $file;
    }
}