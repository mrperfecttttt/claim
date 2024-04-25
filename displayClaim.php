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
    <title>List of Claims</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('displayp.png');
            background-size: cover;
            /* Cover the entire viewport */
            background-attachment: fixed;
        }

        h2 {
            text-align: center;
            position: fixed;
    top: 9px;
    left: 50%;
    transform: translateX(-50%);
        }

        .container {
            max-width: 100%;
            overflow-y: scroll; /* Enable vertical scrolling */
            max-height: 439px;
        }

        .container::-webkit-scrollbar {
    display: none;
}

        .claim-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 45px;
            padding-right: 45px;
            margin-bottom: 20px;
            text-align: center;
            max-width: 500px;
            background-color: rgba(240, 240, 240, 0.7);
        }

        .claim-name,
        .claim-date,
        .claim-total {
            margin-bottom: 10px;
        }

        .claim-name {
            font-weight: bold;
        }

        .claim-date,
        .claim-total {
            font-style: italic;
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
    <div class="container">
        <?php
        // Include the dbconnect.php file to establish database connection
        require_once "dbconnect.php";

        if (isset($_SESSION['success_message'])) {
            // Display alert message and unset the session variable
            echo "<script>alert('{$_SESSION['success_message']}');</script>";
            unset($_SESSION['success_message']);
        }


        // Check if form is submitted (Remove button clicked)
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_claim"])) {
            // Get the ID of the claim to be removed
            $claim_id = $_POST["claim_id"];
            
            // Prepare SQL statement to delete the claim
            $sql = "DELETE FROM claims WHERE id = $claim_id";
            
            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "<p>Claim removed successfully.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Query to retrieve all claims from the database
        $sql = "SELECT * FROM claims";
        $result = $conn->query($sql);
        $total_claims = $result->num_rows;

        // Check if there are any claims retrieved
        if ($result->num_rows > 0) {
            $total_claim_amount = 0;
            // Output data of each row
            echo "<h2>List of Claims ($total_claims)</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='claim-container'>";
                echo "<div class='claim-name'>" . $row["claim_name"] . "</div>";
                echo "<div class='claim-date'>" . $row["claim_date"] . "</div>";
                echo "<div class='claim-total'>Total Claim: RM" . $row["total_claim"] . "</div>";
                
                // Add Remove button for each claim
                echo "<form action='remove.php' method='post'>";
                echo "<input type='hidden' name='claim_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' name='remove_claim'>Remove</button>";
                echo "</form>";
                
                echo "</div>";

                // Add the total claim amount
                $total_claim_amount += $row["total_claim"];
            }
            
        } else {
            echo "No claims found";
        }

        // Close MySQL connection
        $conn->close();
        ?>
    </div>
</body>

</html>
