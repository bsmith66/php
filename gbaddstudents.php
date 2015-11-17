<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!DOCTYPE html>
<html>
<head>
<title>Add Users</title>
</head>
<body>
<?php
// Setting up the Database Connection
$servername = "localhost";
$username = "bsmith66";
$password = "zytyveved";
$dbname = "bsmith66_gradebook";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Capturing the POST Data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$advisor_id = $_POST['advisor_id'];
// Creating the SQL statement
$sql = "INSERT INTO students (first_name, last_name, advisor_id)
VALUES ('$firstname', '$lastname', '$advisor_id')";
// Executing the SQL statement
if ($conn->query($sql) === TRUE) {
echo "Record added successfully";
} else {
echo "Error: " . $sql . "
" . $conn->error;
}
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
First Name: <input type="text" name="firstname"><br />
Last Name: <input type="text" name="lastname"><br />
Advisor ID: <select name="advisor_id">
<?php
$sql = "SELECT * FROM advisor;";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
echo "<option value='" . $row['advisor_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
}
?>
</select>
State: <select name="state_id">
<?php 
$sql = "SELECT * FROM state;";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
echo "<option value='" . $row['state_id'] . "'>" . $row['name'] . "</option>"; 
}
?>
</select>
<br />
<input type="submit" value="submit">
</form>
</body>
</html>
</body>
</html>