<?php
//Sets up the database connection
require("lsconnection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
</head>

<body>
<?php
// Checks to see if we have POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Check to make sure username has something in it
if(empty($_POST['username'])) {
	die("You did not enter a username");
}
// Check to see if the password has something in it
if(empty($_POST['password'])) {
	die("You did not enter a password");
}
// Check to see if the email is valid
if (!filter_var($_POST['email'])) {
	die("You did not enter a valid email");
}

//Capturing the POST Data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

//Checking for duplicate usernames
$sql = "SELECT username FROM users WHERE username = $username;";
$result = $conn->query($sql);
if (mysqli_num_rows($result) != 0 ) {
	die("Username already exists");
}
//Checking for duplicate usernames
$sql = "SELECT email FROM users WHERE email = $email;";
$result = $conn->query($sql);
if (mysqli_num_rows($result) != 0 ) {
	die("Email already exists");
}

$hash = password_hash($password, PASSWORD_BCRYPT);

// Creating the SQL statement
$sql = "INSERT INTO users (firstname, lastname, email, username, password)
VALUES ('$firstname', '$lastname', '$email', '$username', '$hash')";
// Executing the SQL statement
if ($conn->query($sql) === TRUE) {
echo "Record added successfully";
} else {
echo " " . "Error: " . $sql . "
" . $conn->error;
}
$conn->close();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
First Name: <input type="text" name="firstname"><br />
Last Name: <input type="text" name="lastname"><br />
Username: <input type="text" name="username"><br />
Email Address: <input type="text" name="email"><br />
Password: <input type="password" name="password"><br />
<input type="submit" value="submit">
</form>

</body>
</html>