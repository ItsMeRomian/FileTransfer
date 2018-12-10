<?php
$root = "/var/www/dynahost/FileTransfer/"; 	// end with "/"
$uploads = "uploads/";						// end with "/"
$uploadfolder = $root . $uploads;  
?>
<!DOCTYPE html>
<html>
<header>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</header>
<body>
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
				?><tr><td><?=$file?></td><td><a href='uploads/<?=$file?>'>view</a></td><td><a href='deleteone.php?id=<?=$file?>'>delete</a></td></tr><?php
			} else {
				echo $file . "<br>";
			}
		}
	}
}
//Upload a file
function upload($uploads) {
	$imagestypes = array('png' => 'image/png','jpe' => 'image/jpeg','jpeg' => 'image/jpeg','jpg' => 'image/jpeg',       'gif' => 'image/gif','bmp' => 'image/bmp','ico' => 'image/vnd.microsoft.icon','tiff' => 'image/tiff','tif' => 'image/tiff','svg' => 'image/svg+xml','svgz' => 'image/svg+xml');
	$temp = $_FILES["FileToUpload"]["name"]; // Gets original filename
	//creates fileurl and name
	$fileurl = $uploads . $temp;
	
	if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $fileurl)) { // move file from php temp to server
        echo "<h1>yey</h1>File Uploaded, link to file:<br> <a href='" . $fileurl . "'>" . $fileurl . "</a><br>";
		$filesize = $_FILES["FileToUpload"]["size"];
		$type = $_FILES['FileToUpload']['type'];
		$filesize = round($filesize * 0.000001, 0); // bytes to Kb
		
		if ($filesize <= 0) { 
			echo "File size: <1kB<br>"; 
		} else {
			echo "File size: " . $filesize . "kB<br>";
		}
		
		echo "File Type: " . $type;
		if (in_array($type, $imagestypes)) {
			echo "<br>preview:<br><img width='300' src='" . $fileurl . "'>";
		}
	}
}
//Delete a single file
function deleteone($id) {
	global $uploadfolder;
	$filetodelete = $uploadfolder . $id;
	$files = glob($uploadfolder . '*'); 
	if (in_array($filetodelete, $files)) {
		unlink($filetodelete);
		header("Location: index.php");
	}
}
//Delete all files
function deleteall() {
	global $uploadfolder;
	$files = glob($uploadfolder . '*'); 
	foreach($files as $file){ 
		unlink($file);
		header("Refresh:0");
	}
}
?>