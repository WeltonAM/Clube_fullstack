<?php

function getExtension($name)
{
    return pathinfo($name, PATHINFO_EXTENSION);
}

function getFunctionCreateFrom($extension)
{
    return match($extension){
        'pgn' => ['imagecreatefrompng', 'imagepng'],
        'jpg', 'jpeg' => ['imagecreatefromjpeg', 'imagejpeg'],
        'gif' => ['imagecreatefromgif', 'imagegif'],
    };
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

function upload()
{
    $extension = getExtension($_FILES['file']['name']);

    $dst = imagecreatetruecolor(640, 480);

    [$width, $height] = getimagesize($_FILES['file']['tmp_name']);

    [$functionCreateFrom, $saveImage] = getFunctionCreateFrom($extension);
    
    $src = $functionCreateFrom($_FILES['file']['tmp_name']);

    imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 480, $width, $height);

    $saveImage($dst,"assets/img/teste.png");
}