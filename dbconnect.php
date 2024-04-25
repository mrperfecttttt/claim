<?php
$servername = "localhost"; 
$username = "mrperfectt"; 
$password = "P@55w0rd$"; 
$database = "claims"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
