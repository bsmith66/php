<?php
require("lsconnection.php");
if (isset($_SESSION['username'])) {
echo "Hello " . $_SESSION['username'];

?>

<form action="lsupload.php" method="post" enctype="multipart/form-data">
Select an image:
<input type="file" name="fileToUpload" id="fileToUpload" /> </br>
<input type="submit" value="Upload Image" name="submitImage" />
</form>

<?php
} else {
	header('Location: lslogin.php');
}
?>