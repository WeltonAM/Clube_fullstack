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

        return $this;
    }

    public function email($model, $field, $value)
    {
        $user = $model->findBy($field, $value);

        if($user) $this->errors[$field] = 'Email already exists';

        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}