<?php
$img_arr1 = array(
    "image/jpeg" => ".img",
    "image/png" => ".png",
    "image/gif" => ".gif",
    "image/bmp" => ".bmp",
    "image/jpg" => ".jpg"
);
echo $img_arr1["image/jpeg"];
echo $img_arr1["image/png"];
echo $img_arr1["image/gif"];
echo $img_arr1["image/bmp"];
echo $img_arr1["image/jpg"];

?>





(
($_FILES['uploadfile']['type'] == "image/jpeg") ||
($_FILES['uploadfile']['type'] == "image/png") ||
($_FILES['uploadfile']['type'] == "image/gif") ||
($_FILES['uploadfile']['type'] == "image/bmp") ||
($_FILES['uploadfile']['type'] == "image/jpg")

) {	// массив расширений для картинки