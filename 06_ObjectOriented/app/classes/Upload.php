<?php

namespace app\classes;

class Upload
{
    private $file; // access modifiers 

    public function __construct($file) //
    {
        $this->file = $file;
    }

    protected function extension()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }

    protected function rename()
    {
        $uniqueId = uniqid(true);
        return $uniqueId.'.'.$this->extension();
    }

}