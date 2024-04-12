<?php
// Include your database connection file
include 'connection.php';

// Define default values for the variables
$totalBirds = 0;
$totalDeaths = 0;
$avgMortalityRate = 0;
$totalEggs = 0;

// Define and execute SQL queries to retrieve statistics
$queryBirds = "SELECT SUM(NumberOfBirds) AS totalBirds FROM Birdspurchase";
$queryDeaths = "SELECT SUM(Deaths) AS totalDeaths FROM BirdsMortality";
$queryEggs = "SELECT SUM(NumberOfEggs) AS totalEggs FROM Production";

$resultBirds = $conn->query($queryBirds);
$resultDeaths = $conn->query($queryDeaths);
$resultEggs = $conn->query($queryEggs);

// Fetch data from the results if queries are successful
if ($resultBirds && $resultBirds->num_rows > 0) {
    $totalBirds = max(0, $resultBirds->fetch_assoc()['totalBirds']);
}
if ($resultDeaths && $resultDeaths->num_rows > 0) {
    $totalDeaths = max(0, $resultDeaths->fetch_assoc()['totalDeaths']);
}
if ($resultEggs && $resultEggs->num_rows > 0) {
    $totalEggs = max(0, $resultEggs->fetch_assoc()['totalEggs']);
}

// Calculate average mortality rate if both totalBirds and totalDeaths are greater than 0
if ($totalBirds > 0 && $totalDeaths > 0) {
    $avgMortalityRate = ($totalDeaths / $totalBirds) * 100;
    // Round avgMortalityRate to two decimal places
    $avgMortalityRate = round($avgMortalityRate, 1);
    $avgMortalityRate .= '%';
}
?>
