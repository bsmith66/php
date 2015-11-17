<!DOCTYPE html>
<html>
<head>
<title>Add Users</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Setting up the Database Connection
$servername = "localhost";
$username = "bsmith66";
$password = "zytyveved";
$dbname = "bsmith66_lecturesnippets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Capturing the POST Data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
// Creating the SQL statement
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('$firstname', '$lastname', '$email')";
// Executing the SQL statement
if ($conn->query($sql) === TRUE) {
echo "Record added successfully";
} else {
echo "Error: " . $sql . "
" . $conn->error;
}
$conn->close();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
First Name: <input type="text" name="firstname"><br />
Last Name: <input type="text" name="lastname"><br />
Email Address: <input type="text" name="email"><br />
<input type="submit" value="submit">
</form>
</body>
</html>