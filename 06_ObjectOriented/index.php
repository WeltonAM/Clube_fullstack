<?php

require "vendor/autoload.php";

use app\classes\UploadPhoto;

$upload = new UploadPhoto('photo.png'); // $this equals $upload inside of the class 

$upload->extension();
$upload->rename();
echo $upload->upload();