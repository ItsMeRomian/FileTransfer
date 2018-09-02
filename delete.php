<?php include_once("include.php"); ?>

<h2>Are you sure you want to delete these files? <a href="delete.php?ye">ye</a> / <a href="index.php">no wait go back</a></h2>
<br>
<?php
echo getlist(0, 0);

if (isset($_GET["ye"])) {
deleteall();
}
?>
