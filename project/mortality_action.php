<?php
// Include the database connection file
include 'connection.php';
// Initialize variables for form fields
$date = '';
$deaths = '';
$update = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If an update action is requested
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $deaths = $_POST['deaths'];

        $sql = "UPDATE BirdsMortality SET Date='$date', Deaths='$deaths' WHERE BirdsMortality_ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else if (isset($_POST['save'])) { // If a new mortality record is being added
        $date = $_POST['date'];
        $deaths = $_POST['deaths'];

        $sql = "INSERT INTO BirdsMortality (Date, Deaths) VALUES ('$date', '$deaths')";

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
    $result = $conn->query("SELECT * FROM BirdsMortality WHERE BirdsMortality_ID=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['Date'];
        $deaths = $row['Deaths'];
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM BirdsMortality WHERE BirdsMortality_ID=$id");

    echo "Record deleted successfully";
}
?>
