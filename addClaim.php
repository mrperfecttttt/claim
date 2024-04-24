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
    <title>Add Claim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('addp.png');
            background-size: cover;
            /* Cover the entire viewport */
            background-attachment: fixed;
            /* Prevent scrolling */
        }

        .form-container {
            text-align: center;
            margin: 30px;
        }

        .form-container input[type="date"],
        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<a class="back-button" href="home.php">Back</a>
    <div class="form-container">
        <h2>Add Claim</h2>
        <form action="add.php" method="post">
            <input type="date" name="claim_date" required>
            <input type="text" name="claim_name" placeholder="Claim Name" required>
            <input type="number" name="total_claim" placeholder="Total Claim (RM)" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>