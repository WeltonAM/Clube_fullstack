<?php

namespace app\classes;

class Validation
{
    private $validate = [];

    public function validate($post)
    {
        foreach($post as $key => $value){
            $this->validate[$key] = strip_tags($value);
        }

        return (object)$this->validate;
    }
}