<?php

namespace app\classes;

class Upload
{
    public function upload($request, $response)
    {
        $fileName = $_FILES['file']['name'];
        $fileTemp = $_FILES['file']['tmp_name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $resiWidth = 350;
        $resiHeight = 300;

        list($width, $height) = getimagesize($fileTemp);

        $newName = time();

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $fromJpeg = imagecreatefromjpeg($fileTemp);
                $imageLayer = imagecreatetruecolor($resiWidth, $resiHeight);
                imagecopyresampled($imageLayer, $fromJpeg, 0, 0, 0, 0, $resiWidth, $resiHeight, $width, $height);
                imagejpeg($imageLayer, "./uploads/".$newName.'.'.$extension);
                break;
            case 'png':
                $fromPng = imagecreatefrompng($fileTemp);
                $imageLayer = imagecreatetruecolor($resiWidth, $resiHeight);
                imagecopyresampled($imageLayer, $fromPng, 0, 0, 0, 0, $resiWidth, $resiHeight, $width, $height);
                imagepng($imageLayer, "./uploads/".$newName.'.'.$extension);
                break;
            
            default:
                var_dump("Extension not accepted");
                break;
        }

        return $response;
    }
}