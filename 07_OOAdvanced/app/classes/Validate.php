<?php

class Validate
{
    private $validations = [];

    public function validate()
    {
        $result = [];
        $param = '';
        foreach($this->validations as $field => $validate){
            $result[field] = (!str_contains($validate, '|')) ? $this->singleValidation($validate, $field, $param) : $this->multipleValidations($validate, $field, $param);
        }

        if(in_array(false, $result)){
            return false;
        }

        return $result;
    }

    public function setValidations($validations)
    {
        $this->validations = $validations;
    }

    public function singleValidation()
    {
        return 'single validations';
    }

    public function multipleValidations()
    {
        return 'multiple validations';
    }
}

$validations = new Validate();
$validations->setValidations([
    'firstName' => 'required',
    'email' => 'required|email',
]);
var_dump($validations->validate());