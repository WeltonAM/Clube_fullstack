<?php

interface UploadInterface { //like an abstract class
    public function uploadFile();
}

class Upload
{
    private $upload;

    public function __construct(UploadInterface $upload)
    {
        $this->upload = $upload;
    }

    public function doUpload(){
        return $this->upload->uploadFile();
    }
}

class UploadPdf implements UploadInterface
{
    public function uploadFile()
    {
        return "Upload pdf file";
    }
}

class UploadPhoto implements UploadInterface
{
    public function uploadFile()
    {
        return "Upload photo";   
    }
}

$upload = new Upload(new UploadPhoto);
echo $upload->doUpload();