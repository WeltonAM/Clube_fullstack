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
    if(!isset($_POST['senha'], $_POST['senha_confirmada'])){
        setFlash($field, "Os campos para atualizar a senha são obrigatórios");
        return false;
    }
    
    $senha = strip_tags($_POST['senha']);
    $senha_confirmada = strip_tags($_POST['senha_confirmada']);
    
    if($senha !== $senha_confirmada){
        setFlash($field, "Senhas precisam ser identicas");
        return false;
    }

    return $senha;
}