<?php
// Handle search query
if(isset($_GET['q'])) {
    $searchTerm = $_GET['q'];

    // Example: Redirect to specific pages based on search term
    switch ($searchTerm) {
        case 'sales':
            header("Location: sale.php");
            exit();
        case 'production':
            header("Location: production.php");
            exit();
        case 'feed':
            header("Location: feed.php");
            exit();
        case 'purchase':
            header("Location: purchase.php");
            exit();  
        case 'mortality':
            header("Location: mortality.php");
            exit();  
        case 'payroll':
            header("Location: payroll.php");
            exit();
        case 'Dashboard':
            header("Location: Dashboard.php");
            exit();
        default:
            // If search term doesn't match any specific page, redirect to a general search results page or display an error message
            echo "Sorry, the page for '$searchTerm' was not found.";
    }
}
?>,
