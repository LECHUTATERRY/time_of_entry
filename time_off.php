<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $user_id = $_SESSION['user_id'];
    if ($_POST['submit'] == 'entry') {
        $time_entry = $_POST['time_entry'];
        $stmt = $conn->prepare("INSERT INTO time_entries (user_id, time_of_entry) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $time_entry);
    } elseif ($_POST['submit'] == 'time_off') {
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $reason = $_POST['reason'];
        $stmt = $conn->prepare("INSERT INTO time_off (user_id, start_time, end_time, reason) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $start_time, $end_time, $reason);
    }
    
    if ($stmt->execute()) {
        echo "Successfully recorded.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
