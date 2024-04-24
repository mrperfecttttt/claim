<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page or any other desired page
header("Location: index.html");
exit; // Make sure no code is executed after redirection
?>
