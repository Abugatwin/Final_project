<?php
include 'connection.php'; // Include your database connection file

// Initialize variables
$totalSales = 0;
$totalWages = 0;
$eggsLeft = 0;

// Query to calculate total sales
$sqlTotalSales = "SELECT SUM(revenue) AS total_sales FROM Sales";
$resultTotalSales = $conn->query($sqlTotalSales);
if ($resultTotalSales->num_rows > 0) {
    $rowTotalSales = $resultTotalSales->fetch_assoc();
    $totalSales = $rowTotalSales['total_sales'];
}

// Query to calculate eggs left
$sqlEggsLeft = "SELECT SUM(NumberOfEggs) AS total_eggs FROM Production";
$resultEggsLeft = $conn->query($sqlEggsLeft);
if ($resultEggsLeft->num_rows > 0) {
    $rowEggsLeft = $resultEggsLeft->fetch_assoc();
    $totalEggsProduced = $rowEggsLeft['total_eggs'];
}

$sqlEggsSold = "SELECT SUM(NumberOfEggs) AS total_eggs_sold FROM Sales";
$resultEggsSold = $conn->query($sqlEggsSold);
if ($resultEggsSold->num_rows > 0) {
    $rowEggsSold = $resultEggsSold->fetch_assoc();
    $totalEggsSold = $rowEggsSold['total_eggs_sold'];
}

// Calculate eggs left
$eggsLeft = $totalEggsProduced - $totalEggsSold;
?>,