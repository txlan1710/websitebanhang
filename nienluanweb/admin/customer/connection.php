<?php
$name = "localhost";
$username = "root";
$password = "Jiyeon12345!";
$database_name = "db_webbanhang";

// Create connection
$conn = new mysqli($name, $username, $password, $database_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>