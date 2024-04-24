<?php
// Include the dbconnect.php file
require_once "dbconnect.php";

// Initialize session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to retrieve user with given username and password
    $sql = "SELECT * FROM creds WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid user, set session for user ID and redirect to home.php
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the column name for user ID in your database
        header("Location: home.php");
        exit();
    } else {
        // Invalid user, redirect to error.php
        header("Location: error.php");
        exit();
    }
}

// Close MySQL connection
$conn->close();
?>
