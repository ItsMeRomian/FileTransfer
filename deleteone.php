<?php
include_once("include.php");

$filetodelete = $uploadfolder . $_GET['id'];
$files = glob($uploadfolder . '*'); 

if (in_array($filetodelete, $files)) {
	//echo "file removed.<br><br> <a href='index.php'>go back</a>";
	header("Location: index.php");
	unlink($filetodelete);
} else {
	echo "File not found!<br><br>Searched for: <br>" . $filetodelete . "<br><br>" . "List of all files: <br>" . getlist(0);
}