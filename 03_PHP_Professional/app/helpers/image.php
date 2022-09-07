<?php

function getExtension($name)
{
    return pathinfo($name, PATHINFO_EXTENSION);
}

function isFileToUpload($fieldName)
{
    if(!isset($_FILES[$fieldName]) || !isset($_FILES[$fieldName]['name']) || $_FILES[$fieldName]['name'] === ''){
        throw new Exception("O campo {$fieldName} não existe ou imagem não escolhida");
        
    }
}

function isImage($extension)
{
    if(!in_array($extension, ['jpeg', 'jpg', 'gif', 'png'])){
        throw new Exception("Arquivo não aceito");
    }
}