<?php

namespace app\classes;

class UploadPhoto
{
    public $file;
    public $newName;
    public $extensions = ['png', 'jpg'];

    public function __construct($file) //
    {
        $this->file = $file;
    }

    public function extension()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }

    public function rename()
    {
        $uniqueId = uniqid(true);
        $this->newName = $uniqueId.'.'.$this->extension();
    }
    
    public function upload()
    {
        return $this->newName;
    }
}