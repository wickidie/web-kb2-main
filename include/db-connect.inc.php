<?php
$servername = "localhost";
$username = "root";
$password = "Admin@123";
$dbname = "codelab";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully\n";
?>