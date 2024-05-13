<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9; /* Light grey background */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            background: white;
            border-radius: 8px;
            width: 50%; /* Adjust width as needed */
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #5c67f2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #4a54e1;
        }
        a:hover, button:hover {
            background-color: #4a54e1;
        }
        a, button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #5c67f2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our System</h1>
        <p>Learn more about what our system can do for you, and how we can help you manage your time efficiently.</p>
        <div>
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        </div>
        <div class="container">
        <h1>Admin Access</h1>
        <p>If you are an administrator, please use the link below to access the admin panel.</p>
        <a href="admin_login.php">Admin Login</a>
    </div>
    <div class="container">
        <h1>Time Management</h1>
        <p>Click below to record your time out or manage other time-related activities.</p>
        <button onclick="location.href='time_out.php'">Time Out</button> <!-- Direct link to time out page or functionality -->
    </div>
    </div>
</body>
</html>
