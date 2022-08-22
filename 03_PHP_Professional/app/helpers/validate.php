<?php

function validate(array $validations)
{
    $result = [];
    $param = '';

    foreach ($validations as $field => $validate){
        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidations($validate, $field, $param):
            multipleValidations($validate, $field, $param);
    }
    
    if(in_array(false, $result)){
        return false;   
    }

    return $result;
}

function singleValidations($validate, $field, $param)
{
    if(str_contains($validate, ':')){
        [$validate, $param] = explode(':', $validate);
    }
    return $validate($field, $param);
}

function multipleValidations($validate, $field, $param)
{
    $explodePipeValidate = explode('|', $validate);
    
    foreach ($explodePipeValidate as $validate) {
        if(str_contains($validate, ':')){
            [$validate, $param] = explode(':', $validate);
        }
        $result = $validate($field, $param);
    }

    return $result;
}