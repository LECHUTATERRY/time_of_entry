<?php
require 'config.php';

if ($conn) {
    echo "Database connection established successfully.<br>";
} else {
    echo "Failed to connect to the database.<br>";
    exit; // Stop further execution if the database connection is not available
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        echo "Registration successful! You can now <a href='login.html'>login here</a>.";
        // Optionally, automatically redirect to the login page or time entry page
        // header("Location: login.html");
        // exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Please use the form to submit data.";
}

$conn->close();
?>
