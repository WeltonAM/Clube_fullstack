<?php

require "vendor/autoload.php";

use app\classes\UploadPhoto;

$upload = new UploadPhoto; // $this equals $upload inside of the class 
$upload->file('foto.png');
$upload->extension();
$upload->rename();
echo $upload->upload();