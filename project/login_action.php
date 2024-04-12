<?php

include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username from the form
    $username = $_POST["username"];
    
    // Check if password field is set
    if (isset($_POST["password"])) {
        // Retrieve password from the form
        $password = $_POST["password"];

        // Prepare and execute SQL query to fetch user from database
        $sql = "SELECT * FROM User WHERE Username='$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // User found, verify password
            $row = $result->fetch_assoc();
            if ($password == $row["Password"]) { // Assuming passwords are not hashed
                // Password is correct, redirect to dashboard
                header("Location: Dashboard.php");
                exit();
            } else {
                // Password is incorrect
                $error = "Invalid username or password. Please try again.";
            }
        } else {
            // User not found
            $error = "User not found. Please try again.";
        }
    } else {
        // Password field not set
        $error = "Password field is required.";
    }
}
