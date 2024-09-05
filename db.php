<?php
// Database configuration
$host = 'localhost';  // Host name (e.g., localhost for local development)
$username = 'root';   // Database username
$password = '';       // Database password (empty for local development)
$database = 'ecommerce';  // Database name

// Create a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set the character set to utf8 for compatibility
mysqli_set_charset($conn, "utf8");

// If the connection is successful, this file is silently included wherever needed
?>
