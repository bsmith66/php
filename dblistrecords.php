<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dblistrecords</title>
</head>

<body>
<?php
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
// SQL Query
$sql = "SELECT * FROM users;";
$result = $conn->query($sql);
//Echoing the field column names in a table
echo "<table>";
echo "<tr>";
echo "<th style='width:200px; border:1px solid;'>User ID</th>";
echo "<th style='width:200px; border:1px solid;'>Last Name</th>";
echo "<th style='width:200px; border:1px solid;'>First Name</th>";
echo "<th style='width:250px; border:1px solid;'>Email</th>";
echo "</tr>";

//Loop through and echo all the records
while ($row = $result->fetch_assoc()){
echo "<tr>";
echo "<td>" . "<a href='dbeditrecord.php?user_id=" . $row['user_id'] . "'>" . $row['user_id'] . "</a></td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>