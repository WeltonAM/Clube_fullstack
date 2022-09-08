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
    if(!isset($_FILES[$fieldName], $_FILES[$fieldName]['name']) || $_FILES[$fieldName]['name'] === ''){
        throw new Exception("O campo {$fieldName} não existe ou imagem não escolhida");   
    }
}

function isImage($extension)
{
    $acceptedExtentions = ['jpeg', 'jpg', 'gif', 'png'];
    if(!in_array($extension, $acceptedExtentions)){
        $extensions = implode(', ', $acceptedExtentions);
        throw new Exception("Arquivo inválido. Carregue um {$extensions}");
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

function crop($width, $height, $newWidth, $newHeight)
{
    $thumbWidth = $newWidth;
    $thumbHeight = $newHeight;

    $srcAspect = $width / $height;
    $dstAspect = $thumbWidth / $thumbHeight;

    ($srcAspect >= $dstAspect) ?
        $newWidth = $width / ($height / $thumbHeight) :
        $newHeight = $height / ($width / $thumbWidth);

    return [$newWidth, $newHeight, $thumbWidth, $thumbHeight];
}

function upload($newWidth, $newHeight, $folder, $type = 'resize')
{
    isFileToUpload('file');
    
    $extension = getExtension($_FILES['file']['name']);

    isImage($extension);

    [$width, $height] = getimagesize($_FILES['file']['tmp_name']);

    [$functionCreateFrom, $saveImage] = getFunctionCreateFrom($extension);
    
    $src = $functionCreateFrom($_FILES['file']['tmp_name']);

    if($type === 'resize'){
        [$newWidth, $newHeight] = resize($width, $height, $newWidth, $newHeight);
        $dst = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    } else {
        [$newWidth, $newHeight, $thumbWidth, $thumbHeight] = crop($width, $height, $newWidth, $newHeight);
        $dst = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled(
            $dst, 
            $src, 
            0 - ($newWidth - $thumbWidth) / 2,
            0 - ($newHeight - $thumbHeight) / 2,
            0, 
            0, 
            $newWidth, 
            $newHeight, 
            $width, 
            $height
        );
    }

    $path = $folder.DIRECTORY_SEPARATOR.rand().'.'.$extension;

    $saveImage($dst, $path);

    return $path;
}