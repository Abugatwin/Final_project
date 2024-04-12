<?php
// Start session
session_start();

// Function to check for login
function isLoggedIn(){
    return isset($_SESSION['user_id']);
}

// Check if there is an error message set in the session
if(isset($_SESSION['error_message'])) {
    // Display the error message
    echo "<h2 style='color: red; text-align: center; font-family: Arial'>".$_SESSION['error_message']."</h2>";

    // Unset the session variable to clear the message
    unset($_SESSION['error_message']);
}
?>,
