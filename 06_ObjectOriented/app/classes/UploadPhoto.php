<?php

namespace app\classes;

class UploadPhoto extends Upload
{
    public $extensions = ['png', 'jpg'];
    
    public function upload()
    {
        return $this->rename();
    }
}