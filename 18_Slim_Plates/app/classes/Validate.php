<?php

namespace app\classes;

class Validate
{
    private $errors = [];

    public function required(array $fields)
    {
        foreach ($fields as $field) {
            if(empty($_POST[$field])){
                Flash::set($field, 'Required field', 'danger');
                $this->errors[$field] = true;
            }
        }

        return $this;
    }

    public function exist($model, $field, $value)
    {
        $data = $model->findBy($field, $value);

        if($data){
            Flash::set($field, 'Email already exists', 'danger');
            $this->errors[$field] = true;
        }

        return $this;
    }

    public function email($email)
    {
        $validated = filter_var($email, FILTER_VALIDATE_EMAIL);

        if(!$validated){
            Flash::set($email, 'Email invalid', 'danger');
            $this->errors[$email] = true;
        } 
    }

    public function getErrors()
    {
        return !! $this->errors;
    }
}