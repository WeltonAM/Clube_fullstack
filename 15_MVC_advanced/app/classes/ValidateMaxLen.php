<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxLen implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = strip_tags($_POST[$field]);

        if(strlen($string) > $param){
            Flash::set($field, "Password can't have more than {$param} features");
            return false;
        }

        return $string;
    }
}