<?php
// Database configuration
$servername = "localhost";  // Server name, typically localhost on a local development environment
$username = "root";         // Default XAMPP MySQL username
$password = "";             // Default XAMPP MySQL password is empty
$dbname = "employee_time_tracking";  // Replace 'your_database_name' with the actual name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Close connection
$conn->close();
?>
