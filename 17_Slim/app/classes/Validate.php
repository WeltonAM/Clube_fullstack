<?php

namespace app\classes;

class Validate
{
    private $errors = [];

    public function required(array $fields)
    {
        foreach ($fields as $field) {
            if(empty($_POST[$field])){
                $this->errors[$field] = 'Required field';
            }
        }

        return $this;
    }

    public function exist($model, $field, $value)
    {
        $data = $model->findBy($field, $value);

        if($data) $this->errors[$field] = 'Email already exists';

        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}