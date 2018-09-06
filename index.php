<?php include_once("include.php");?>
<div class="top">
		<a style="margin-right: 25px; margin: 10px;" href="delete.php">delete all files in /uploads/</a>
</div>
<div class="main">
	<center>
		<h1>DYNA.<span style="color: green;">HOST</span></h1>
		<form action="upload.php" method="post" enctype="multipart/form-data">			
			<input type="file" name="FileToUpload" id="FileToUpload" class="hidden">
			<label for="FileToUpload">Select file</label>
			<button class="button">
				<span>Uploadddd</span>
				<input class="hidden" type="submit" value="upload yes go" name="submit">
			</button>
		</form>
		<br>
		<br>
		<table>
			<tr>
				<td><b>Files on server:</b></td>
			</tr>
			<?php getlist(1, 1); ?>
		</table>
	</center>
</div>