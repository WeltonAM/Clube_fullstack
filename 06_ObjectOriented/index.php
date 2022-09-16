<?php

require "app/classes/UploadPhoto.php";

$upload = new UploadPhoto;
$upload->file('foto.png');
$upload->extension();
$upload->rename();
echo $upload->upload();