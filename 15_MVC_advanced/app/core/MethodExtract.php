<?php

namespace app\core;

use app\core\Uri;
use app\core\FolderExtract;

class MethodExtract
{
    public static function extract($controller)
    {
        $uri = Uri::uri();
        $folder = FolderExtract::extract($uri);

        $method = 'index';

        $indexOne = Uri::uriExist($uri, index: 1);
        $indexTwo = Uri::uriExist($uri, index: 2);

        $method = (!$folder) ?
        strtolower($indexOne): 
        strtolower($indexTwo);

        if($method === ''){
            $method = 'index';
        }

        if(!method_exists($controller, $method)){  
            $method = 'index';
            $sliceIndexStartFrom = (!$folder) ? 1 : 2;
        } else {
            $sliceIndexStartFrom = (!$folder) ? 2 : 3;
        }

        return [
            $method, $sliceIndexStartFrom
        ];
    }
}