<?php
session_start();

// Check if the user is not logged in (assuming you set a session variable upon login)
if (!isset($_SESSION['user_id'])) {
    // Redirect to index.html
    header("Location: index.html");
    exit; // Make sure no code is executed after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('home.png');
            background-size: cover;
            /* Cover the entire viewport */
            background-attachment: fixed;
            /* Prevent scrolling */
        }

        .button-container {
            text-align: center;
        }

        .button-container button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }

        .header {
            position: fixed;
            top: 20px;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            color: #fff;
            text-align: right;
            margin-right: 60px;
        }

        .logout-button {
            background-color: #dc3545; /* Red color for logout button */
            color: #fff; /* White text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s; /* Smooth transition on hover */
        }
    </style>
</head>

<body>
    <div class="header">
        <button class="logout-button" onclick="location.href='logout.php'">Logout</button>
    </div>
    <div class="button-container">
        <button onclick="location.href='addClaim.php'">Add New Claim</button>
        <button onclick="location.href='displayClaim.php'">Display All Claims</button>
    </div>
</body>

</html>