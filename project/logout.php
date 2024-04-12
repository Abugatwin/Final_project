<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (change "login.php" to the actual login page URL)
header("Location: index.php");
exit;
?>
