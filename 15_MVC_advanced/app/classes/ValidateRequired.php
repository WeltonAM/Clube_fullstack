<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateRequired implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = strip_tags($_POST[$field]);

        if($string === ''){
            Flash::set($field, 'Field required');
            return false;
        }

        Old::set($field, $string);

        return $string;
    }
}