<?php

namespace app\classes;

use app\traits\ValidationFile;

class UploadFile extends Upload
{
    use ValidationFile;

    private $extensions = ['zip', 'pdf', 'rar'];

    public function __construct($file)
    {
        parent::__construct($file);
        echo 'construct from upload file';
    }
    
    public function upload()
    {
        return $this->rename();
    }
}