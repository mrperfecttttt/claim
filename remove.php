<?php
// Include the dbconnect.php file to establish database connection
require_once "dbconnect.php";

// Check if form is submitted (Remove button clicked)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_claim"])) {
    // Get the ID of the claim to be removed
    $claim_id = $_POST["claim_id"];
    
    // Prepare SQL statement to delete the claim
    $sql = "DELETE FROM claims WHERE id = $claim_id";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Set session variable for success message
        session_start();
        $_SESSION['success_message'] = "The claim has been successfully removed.";
        
        // Redirect back to the page where the Remove button was clicked
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQL connection
$conn->close();
?>
