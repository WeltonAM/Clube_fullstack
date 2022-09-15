<?php

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

function confirmed($field)
{
    if(!isset($_POST[$field], $_POST[$field.'_confirmada'])){
        setFlash($field, "Os campos para atualizar a senha são obrigatórios");
        return false;
    }
    
    $value = strip_tags($_POST[$field]);
    $value_confirmada = strip_tags($_POST[$field.'_confirmada']);
    
    if($value !== $value_confirmada){
        setFlash($field, "Os dois campos precisam ser iguais.");
        return false;
    }

    if($field === 'senha'){
        return password_hash($value, PASSWORD_DEFAULT);
    }

    return $value;
}