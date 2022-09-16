<?php

require "vendor/autoload.php";

use app\classes\UploadPhoto;
use app\classes\UploadFile;

$uploadPhoto = new UploadPhoto('photo.png'); // $this equals $upload inside of the class
echo $uploadPhoto->upload().PHP_EOL;

$uploadFile = new UploadFile('pdf.pdf'); 
echo $uploadFile->upload().PHP_EOL;
