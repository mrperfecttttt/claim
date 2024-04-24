<?php
// Include the dbconnect.php file to establish database connection
require_once "dbconnect.php";

// Initialize a variable to hold the alert message
$alert_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $claim_date = $_POST["claim_date"];
    $claim_name = $_POST["claim_name"];
    $total_claim = $_POST["total_claim"];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO claims (claim_date, claim_name, total_claim) VALUES ('$claim_date', '$claim_name', '$total_claim')";

    if ($conn->query($sql) === TRUE) {
        // Set the alert message
        $alert_message = "New record inserted successfully";
    } else {
        // Set the alert message with error details
        $alert_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Claim</title>
    <script>
        // JavaScript function to display the alert message
        function showAlert() {
            // Display the alert message
            var message = "<?php echo $alert_message; ?>";
            alert(message);
            
            // Redirect to home.php after the user clicks "OK"
            window.location.href = "home.php";
        }
    </script>
</head>
<body onload="showAlert()">
</body>
</html>
