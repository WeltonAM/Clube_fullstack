<?php

namespace app\classes;

class UploadFile extends Upload
{
    public $extensions = ['zip', 'pdf', 'rar'];

    public function __construct($file)
    {
        parent::__construct($file);
        echo 'construct from upload file';
    }
    
    public function upload()
    {
        return $this->newName;
    }
}