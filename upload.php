<a href="index.php">Go back</a>
<?php 
include_once("include.php");
$uploadfolder = "uploads/";
$temp = $_FILES["FileToUpload"]["name"]; // Gets original filename

//creates fileurl and name
$fileurl = $uploadfolder . $temp . "--UPLOADED_ON--" . date('d-m-y_H-i-s') . "." . pathinfo($temp_file,PATHINFO_EXTENSION); 


if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $fileurl)) { // move file from php temp to server
        echo "<h1>yey</h1>File Uploaded, link to file:<br> <a href='" . $fileurl . "'>" . $fileurl . "</a><br>";
		$filesize = $_FILES["FileToUpload"]["size"];
		$type = $_FILES['FileToUpload']['type'];
		$filesize = round($filesize * 0.000001, 2); // bytes to Kb
		
		echo "File size: " . $filesize . "kB<br>";
		echo "File Type: " . $type;
		if (in_array($type, $imagestypes)) {
			echo "<br>preview:<br><img width='300' src='" . $fileurl . "'>";
		}
}
?>