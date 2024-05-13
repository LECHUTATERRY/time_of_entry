<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html'); // Redirect to login page
    exit;
}

require 'config.php'; // Ensure this file sets up the $conn variable correctly

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }
        .container {
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            background: white;
            border-radius: 8px;
            width: 300px;
        }
        input[type="datetime-local"], button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #5c67f2;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a54e1;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        echo "Welcome " . htmlspecialchars($_SESSION['username']) ;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $time_of_entry = $_POST['time_of_entry'];
            $user_id = $_SESSION['user_id']; // Ensure this is set during the login process

            $stmt = $conn->prepare("INSERT INTO time_entries (user_id, time_of_entry) VALUES (?, ?)");
            if ($stmt === false) {
                die('MySQL prepare error: ' . htmlspecialchars($conn->error));
            }
            
            $stmt->bind_param("is", $user_id, $time_of_entry);
            if ($stmt->execute()) {
                echo "<p>Time entry recorded successfully.</p>";
            } else {
                echo "<p>Error: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo '<form action="time_entry.php" method="post">
                    <input type="datetime-local" name="time_of_entry" required>
                    <button type="submit">Submit Time Entry</button>
                  </form>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
