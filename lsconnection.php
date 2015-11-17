<?php
//Setting up the Database connection
session_start();
$servername = "localhost";
$username = "bsmith66";
$password = "zytyveved";
$dbname = "bsmith66_lecturesnippets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>