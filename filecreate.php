<?php
if (isset($_POST['submit'])){
	$filename = "files/" . $_POST['filename'];
	fopen($filename, "x");
	fclose($filename);
}
?>


<form action="filecreate.php" method="post">
File Name: <input type="text" name"filename">
<br>
<input type="submit" name="submit" value="submit">
</form>