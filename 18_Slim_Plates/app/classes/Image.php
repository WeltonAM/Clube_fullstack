<?php

namespace app\classes;

class Image
{
    private $fileName;
    private $fileTmp;
    private $extension;
    private $width;
    private $height;
    private $acceptedExtensios = ['jpg', 'jpeg', 'png'];

    public function __construct($image)
    {
        $this->fileName = $image['file']['name'];
        $this->fileTmp = $image['file']['tmp_name'];
        $this->extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        list($this->width, $this->height) = getimagesize($this->fileTmp);
    }

    public function upload($widthToResize, $folder)
    {
        if(!in_array($this->extension, $this->acceptedExtensios)){
            throw new \Exception("Extension not accepted", 1);
            
        }

        $heightToResize = ceil($this->height * ($widthToResize / $this->width));

        $newName = time();

        switch ($this->extension) {
            case 'jpeg':
            case 'jpg':
                $fromJpeg = imagecreatefromjpeg($this->fileTmp);
                $imageLayer = imagecreatetruecolor($widthToResize, $heightToResize);
                imagecopyresampled($imageLayer, $fromJpeg, 0, 0, 0, 0, $widthToResize, $heightToResize, $this->width, $this->height);
                imagejpeg($imageLayer, "./uploads/".$newName.'.'.$this->extension);
                break;
            case 'png':
                $fromPng = imagecreatefrompng($this->fileTmp);
                $imageLayer = imagecreatetruecolor($widthToResize, $heightToResize);
                imagecopyresampled($imageLayer, $fromPng, 0, 0, 0, 0, $widthToResize, $heightToResize, $this->width, $this->height);
                imagepng($imageLayer, "./uploads/".$newName.'.'.$this->extension);
                break;
            
            default:
                throw new \Exception("Extension not accepted", 1);
                break;
        }
    }
}