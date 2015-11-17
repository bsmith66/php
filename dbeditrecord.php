<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
// DB Connection Info
$servername = "localhost";
$username = "bsmith66";
$password = "zytyveved";
$dbname = "bsmith66_lecturesnippets";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Setting GET DATA if available
if (isset($_GET['user_id'])) {
$user_id = $_GET['user_id'];
}
// Setting POST DATA if available
if (isset($_POST['update'])) {
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];
$sql = "UPDATE users SET lastname = '" . $lastname . "', firstname = '" . $firstname . "', email = '" . $email . "'  WHERE user_id = '" . $user_id . "' ;";
if ($conn->query($sql)){
	echo "Record updated successfully";
}
// SQL if DELETE button is pushed
if (isset($_POST['delete'])){
$user_id = $_POST['user_id'];
$sql = "DELETE FROM users WHERE user_id = '" . $user_id . "' ;";
if ($conn->query($sql)){
echo "Record removed successfully";
}
}
// SQL Query
$sql = "SELECT * FROM users WHERE user_id = $user_id ;";
$result = $conn->query($sql);
//Loop through and echo all the records
while ($row = $result->fetch_assoc()){
echo "<form method='post' action='dbeditrecord.php'>";
echo "Last Name: <input type='text' name='lastname' value='" . $row['lastname'] . "'> <br>";
echo "First Name: <input type='text' name='firstname' value='" . $row['firstname'] . "'> <br>";
echo "Email: <input type='text' name='email' value='" . $row['email'] . "'> <br> ";
echo "<input type='hidden' name='user_id' value='" . $row['user_id'] . "'> <br> ";
echo "<input type='submit' name='update' value='update'>";
echo "<input type='submit' name='delete' value='delete'>";
echo "</form>";
}
$conn->close();
?>
<a href="dblistrecords.php">--back</a>
</body>
</html>