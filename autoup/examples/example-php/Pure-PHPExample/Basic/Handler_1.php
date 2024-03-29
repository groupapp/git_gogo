<?php
/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/
//You can change the uploads and thumbnails folder below
define("_UPLOADS", "uploads/");
define("_THUMBNAIL", "uploads/thumbnails/");

$img = file_get_contents('php://input');
$temp = explode(',', $img);
$img = $temp[1];
$t = time();
$name = $_SERVER['HTTP_UPLOADER_NAME'];
$isThumb = $_SERVER['HTTP_UPLOADER_THUMB'];
$data = base64_decode($img);
$file = _UPLOADS.$t.$name;
$success = file_put_contents($file, $data);

if($isThumb == true && stristr($_SERVER['CONTENT_TYPE'], "image") == true){
    $thumbWidth = $_SERVER['HTTP_UPLOADER_THUMBWIDTH'];
    $thumbHeight = $_SERVER['HTTP_UPLOADER_THUMBHEIGHT'];

    $newThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
    $thumbTemp = imagecreatefromstring($data);
    $thumb = imagecopyresampled($newThumb, $thumbTemp, 0, 0, 0, 0, $thumbWidth, $thumbHeight, imagesx($thumbTemp), imagesy($thumbTemp));

    $thumbFile = _THUMBNAIL.$t.$name;
    imagejpeg($newThumb, $thumbFile, 90);
}

if($success){
	$json = ('{"x":[{"y":1}]}');

    echo $json;
}
else{
    echo "Server failed for file: ".$name;
    }
?>