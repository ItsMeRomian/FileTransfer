<?php
$uploadfolder = "/var/www/dynahost/FileTransfer/uploads/"; // end with "/"
?>

<!DOCTYPE html>
<html>
<header>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</header>
<body>
<style>
a:visited, a:hover {
	color: blue;
}
html {
	font-size: 20px;
	font-family: 'Montserrat', sans-serif;
}
div.main {
	font-family: 'Montserrat', sans-serif;
    width: 50;
    height: 100%;
    background-color: transparent;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
	margin-top: 20px;
}

div.top {
	position: absolute;
	top: 0px;
	left: 0px;
}
.hidden {
	display: none;
}
label, button {
	background-color: green;
    color: white;
    padding: 6px;
    padding-left: 10px;
    padding-right: 10px;
	margin-bottom: 5px;
	font-size: 20px;

}
label:hover, button:hover {
	background-color: darkgreen;
}
span.push {
	margin-left: 30px;
}
.preview {
	height: 80px;
}
tr {
	text-align: left;
}
</style>
<?php

//Get a list of all files in uploads folder
 function  getlist($Trim, $DeleteButton) { 
 	global $uploadfolder;
	$files = glob($uploadfolder . '*'); 
	foreach($files as $file){
		if (isset($Trim)) {
			if ($Trim) { //remove path
				$file = str_replace($uploadfolder, "", $file);
			}
		}
		if (isset($DeleteButton)) {
			if ($DeleteButton) { //add delete button
				echo "<tr><td>" . $file . "</td><td><a href='deleteone.php?id=" . $file . "'>delete</a></td><td> <a href='uploads/" .  $file . "'>view</a></td></tr> ";
			} else {
				echo $file . "<br>";
			}
		}
	}
}

function deleteall() {
	global $uploadfolder;
	$files = glob($uploadfolder . '*'); 
	foreach($files as $file){ 
		unlink($file);
		header("Refresh:0");
	}
}

$imagestypes = array
(
	'png' => 'image/png',
	'jpe' => 'image/jpeg',
	'jpeg' => 'image/jpeg',
	'jpg' => 'image/jpeg',       
	'gif' => 'image/gif',
	'bmp' => 'image/bmp',
	'ico' => 'image/vnd.microsoft.icon',
	'tiff' => 'image/tiff',
	'tif' => 'image/tiff',
	'svg' => 'image/svg+xml',
	'svgz' => 'image/svg+xml');