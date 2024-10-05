<?php
$servername = "localhost";
$username = "root"; // Assuming 'root' is your username
$password = ""; // Assuming the password is empty

try {
  $conn = new PDO("mysql:host=$servername;dbname=bbms", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit; // Ensure the script stops if connection fails
}
?>
