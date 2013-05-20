<?php

$file = isset($_FILES['uploadFile']['name']) ? $_FILES['uploadFile'] : '';

$fileArr = explode("." , $file["name"]);

$ext = $fileArr[count($fileArr)-1];

$allowed = array("jpg", "jpeg", "png", "gif", "bmp");

if (in_array($ext, $allowed)){
    move_uploaded_file($file["tmp_name"],"uploaded-images/".$file["name"]);
    echo $file["name"];
}else{
    echo "invalid";
}

?>