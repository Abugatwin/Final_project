<?php
include 'connection.php';

// Retrieve data from the database
$sql = "SELECT SUM(NumberOfBirds) AS totalPurchasedBirds FROM Birdspurchase;
        SELECT SUM(Deaths) AS totalDeathBirds FROM BirdsMortality;
        SELECT SUM(NumberOfEggs) AS totalEggsProduced FROM Production;
        SELECT SUM(NumberOfEggs) AS totalEggsSold FROM Sales";

// Execute the queries
if ($conn->multi_query($sql)) {
    // Fetch results
    $results = array();
    do {
        if ($result = $conn->store_result()) {
            $results[] = $result->fetch_assoc();
            $result->free();
        }
    } while ($conn->next_result());

    // Close the connection
    $conn->close();

    // Extracting data from the results
    $totalPurchasedBirds = $results[0]['totalPurchasedBirds'];
    $totalDeathBirds = $results[1]['totalDeathBirds'];
    $totalEggsProduced = $results[2]['totalEggsProduced'];
    $totalEggsSold = $results[3]['totalEggsSold'];

    // Compute the total number of live birds
    $totalLiveBirds = $totalPurchasedBirds - $totalDeathBirds;

    // Compute the number of eggs left
    $eggsLeft = $totalEggsProduced - $totalEggsSold;

    // Prepare an array with computed values
    $data = array(
        'totalLiveBirds' => $totalLiveBirds,
        'totalDeathBirds' => $totalDeathBirds,
        
        'eggsLeft' => $eggsLeft // Add eggsLeft to the data array
    );

    // Output JSON encoded results
    $jsonData = json_encode($data);
} else {
    echo "Error: " . $conn->error;
}

// Include HTML code for displaying the chart
?>