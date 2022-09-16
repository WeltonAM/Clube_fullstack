<?php

require "vendor/autoload.php";

use app\classes\UploadPhoto;
use app\classes\UploadFile;

$uploadPhoto = new UploadPhoto('photo.png'); // $this equals $upload inside of the class
$uploadPhoto->extension();
$uploadPhoto->rename();
echo $uploadPhoto->upload();

$uploadFile = new UploadFile('pdf.pdf'); 
$uploadFile->extension();
$uploadFile->rename();
echo $uploadFile->upload();
