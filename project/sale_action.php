
<?php
// Include the database connection file
include 'connection.php';

// Initialize variables for form fields
$date = '';
$numEggs = '';
$Revenue = '';
$update = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If an update action is requested
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $numEggs = $_POST['numEggs'];
        $Revenue = $_POST['Revenue'];

        $sql = "UPDATE Sales SET Date='$date', NumberOfEggs='$numEggs', Revenue='$Revenue' WHERE Sales_ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else { // If a new purchase is being added
        $date = $_POST['date'];
        $numEggs = $_POST['numEggs'];
        $Revenue = $_POST['Revenue'];

        $sql = "INSERT INTO Sales (Date, NumberOfEggs, Revenue) VALUES ('$date', '$numEggs', '$Revenue')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch data for editing
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM Sales WHERE Sales_ID=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['Date'];
        $numEggs = $row['NumberOfEggs'];
        $Revenue = $row['Revenue'];
    }
}

// Check if the delete action is triggered
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // Delete sales record from the database
    $sql = "DELETE FROM Sales WHERE Sales_ID=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>