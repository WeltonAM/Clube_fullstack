<?php

namespace app\core;

use app\core\Uri;

class FolderExtract
{
    public static function extract()
    {
        $folder = '';

        $uri = Uri::uri();

        if(isset($uri[0]) and $uri[0] !== ''){
            $folder = $uri[0];

            return is_dir(strtolower(string: ROOT.'/'.CONTROLLER_PATH.$folder)) ? $folder : '';
        }

        return $folder;
    }
}