<?php
// Include your database connection file
include 'connection.php';

// Initialize sales data variable
$sales = [];

// Retrieve sales data from the database
$query = "SELECT Date, Revenue FROM Sales";
$result = $conn->query($query);

// Check if query was successful and data is available
if ($result && $result->num_rows > 0) {
    // Fetch sales data and store it in the $sales array
    while ($row = $result->fetch_assoc()) {
        $sales[] = $row;
    }
} else {
    // Handle case where no sales data is available or query fails
    echo "Error: Unable to retrieve sales data.";
}

// Close the database connection
$conn->close();

// Function to calculate total sales
function calculateTotalSales($sales) {
    $totalSales = 0;
    foreach ($sales as $sale) {
        $totalSales += $sale['Revenue'];
    }
    return $totalSales;
}

// Calculate total sales
$totalSales = calculateTotalSales($sales);

// Echo the total sales with bold and centered formatting
echo '<div style="text-align: center;"><strong>Total Sales: $' . number_format($totalSales, 2) . '</strong></div>';
?>

