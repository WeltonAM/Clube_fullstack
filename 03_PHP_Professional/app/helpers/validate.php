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

function required($field)
{
    if($_POST[$field] === ''){
    setFlash($field, "O campo é obrigatório");
    return false;
}

return strip_tags($_POST[$field]);
}

function email($field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    
    if(!$emailIsValid){
        setFlash($field, "O campo tem que ser um email válido");
        return false;
        
        return strip_tags($_POST[$field]);
    }
}

function unique($field, $param)
{
    $data = strip_tags($_POST[$field]);
    $user = findBy($param, $field, $data);
    
    if($user){
        setFlash($field, "Usuário já cadastrado");
        return false;
    }
    
    return $data;
}

function maxlen($field, $param)
{
    $data = strip_tags($_POST[$field]);

    if(strlen($data) > $param){
        setFlash($field, "Senha não pode passar de {$param} caracteres");
        return false;
    }

    return $data;
}