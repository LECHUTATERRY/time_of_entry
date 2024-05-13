<?php
session_start();
require 'config.php'; // Ensure this file contains the correct database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // Authentication successful
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;

            header("Location: time_entry.php"); // Redirect to time entry page
            exit;
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // No user found
        echo "No user found with that username.";
    }
    $stmt->close();
}
$conn->close();
?>
