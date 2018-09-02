<a href="index.php">Go back</a>
<?php include_once("include.php");
$target_dir = "uploads/";
$temp_file = $_FILES["FileToUpload"]["name"]; // Gets original filename

//creates fileurl and name
$target_file = $target_dir . $temp_file . "--UPLOADED_ON--" . date('d-m-y_H-i-s') . "." . pathinfo($temp_file,PATHINFO_EXTENSION); 


if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $target_file)) { // move file from php temp to server
        echo "<h1>yey</h1>File Uploaded, link to file:<br>";
		echo "<a href='" . $target_file . "'>" . $target_file . "</a><br>";
		$filesize = $_FILES["FileToUpload"]["size"];
		$type = $_FILES['FileToUpload']['type'];
		$filesize = round($filesize * 0.000001, 2);
		
		echo "File size: " . $filesize . "kB<br>";
		echo "File Type: " . $type;
		if (in_array($type, $imagestypes)) {
			echo "<br>preview:<br><img width='300' src='" . $target_file . "'>";
		}
}
?>
<br><br>
