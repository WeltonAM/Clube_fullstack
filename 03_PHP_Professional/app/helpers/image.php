<?php

function getExtension($name)
{
    return pathinfo($name, PATHINFO_EXTENSION);
}

function getFunctionCreateFrom(string $extension)
{
    return match ($extension) {
        'png' => ['imagecreatefrompng', 'imagepng'],
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

function resize($width, $height, $newWidth, $newHeight)
{
    $ratio = $width / $height;

    ($newWidth / $newHeight > $ratio) ?
        $newWidth = $newHeight * $ratio :
        $newHeight = $newWidth / $ratio;

    return [$newWidth, $newHeight];
}

function crop()
{

}

function upload($newWidth, $newHeight, $folder, $type = 'resize')
{
    $extension = getExtension($_FILES['file']['name']);

    [$width, $height] = getimagesize($_FILES['file']['tmp_name']);

    [$functionCreateFrom, $saveImage] = getFunctionCreateFrom($extension);
    
    $src = $functionCreateFrom($_FILES['file']['tmp_name']);

    if($type === 'resize'){
        [$newWidth, $newHeight] = resize($width, $height, $newWidth, $newHeight);
        $dst = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    } else {
        crop();
        // imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 480, $width, $height);
    }



    $saveImage($dst, $folder.DIRECTORY_SEPARATOR.rand().'.'.$extension);
}