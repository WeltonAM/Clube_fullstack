<?php

namespace app\core;

use app\core\Uri;

class FolderExtract
{
    public static function extract($uri):string
    {
        $folder = CONTROLLER_FOLDER_DEFAULT;

        $uri = Uri::uri();

        if(isset($uri[0]) and $uri[0] !== ''){
            return is_dir(strtolower(string: ROOT.'/'.CONTROLLER_PATH.$uri[0])) ? $uri[0] : '';
        }

        return $folder;
    }
}