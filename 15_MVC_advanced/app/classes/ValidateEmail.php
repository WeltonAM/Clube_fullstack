<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateEmail implements ValidateInterface
{
    public function handle($field, $param)
    {
        $isEmail = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if(!$isEmail){
            Flash::set($field, 'Email invalid');
            return false;
        }

        $string = strip_tags($_POST[$field]);

        Old::set($field, $string);

        return $string;
    }
}