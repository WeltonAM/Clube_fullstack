<?php

namespace app\classes;

use app\traits\ValidationFile;

class UploadPhoto extends Upload
{
    use ValidationFile;

    private $extensions = ['png', 'jpg'];

    public static function test()
    {
        return 'Static method test and scope resolution operator';
    }
    
    public function upload()
    {
        return $this->rename();
    }
}