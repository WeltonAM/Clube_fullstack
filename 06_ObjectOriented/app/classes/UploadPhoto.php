<?php

namespace app\classes;

use app\traits\ValidationFile;

class UploadPhoto extends Upload
{
    use ValidationFile;

    private $extensions = ['png', 'jpg'];
    
    public function upload()
    {
        return $this->rename();
    }
}