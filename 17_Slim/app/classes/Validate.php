<?php

namespace app\classes;

class Validate
{
    private $errors = [];

    public function exists(array $fields)
    {
        foreach ($fields as $field) {
            if(empty($_POST[$field])){
                $this->errors[$field] = 'Required field';
            }
            
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}