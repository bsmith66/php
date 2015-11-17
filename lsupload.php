<?php
//Created by Brian Smith
require("lsconnection.php");
//Location where uploaded images go
$target_dir = "images/";
//File path for uploaded image
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//Valid file checker
$uploadCheck = 1;
//Determine the file extension
$targer_file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
//Determine if file is a real picture
//$image_check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//if ($image_check !== false) {
//	echo "File is an image </br>";
//	$uploadCheck = 1;
//} else {
//	echo "File is not an image...nice try";
//	$uploadCheck = 0;
//}
//Check for file type
echo $target_file_extension . "/n";
$finfo = finfo_open(FILEINFO_MIME_TYPE);
echo finfo_file($info, $_FILES['fileToUpload']['tmp_name']);
switch ($file_type) {
	case "image/jpeg":
	$uploadCheck = 1;
	break;
	case "text/plain":
	$uploadCheck = 1;
	break; 
	default:
	$uploadCheck = 0;
	echo "Not approved file type";
}

// Check for duplicate file names
if (file_exists($target_file)){
	echo "A file by that name already exists";
	$uploadCheck = 0;
}
//Time to do the uploading
if ($uploadCheck == 0) {
	echo "Your file was not uploaded";
}
if ($uploadCheck == 1) {
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	echo "The file was uploaded to $target_file";
}
?>