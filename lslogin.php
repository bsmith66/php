<?php
//Sets up the database connection
require("lsconnection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//Capturing the POST Data

$username = $_POST['username'];
$password = $_POST['password'];


// Creating the SQL statement
$sql = "SELECT password FROM users WHERE username = '" . $username . "' LIMIT 1;";

// Executing the SQL statement
$result = $conn->query($sql);

//Extracting the record and storing the hash
while ($row = $result->fetch_assoc()){
	$hash = $row['password'];
}

//Verifying the password to the hash in the database
if (password_verify($password, $hash)) {
$_SESSION['username'] = $username;
header('Location: http://bsmith66.net/lsfirst.php');	
} else {
echo "Epic fail";
}

$conn->close();
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Username: <input type="text" name="username"><br />
Password: <input type="password" name="password"><br />
<input type="submit" value="submit">
</form>
</body>
</html>