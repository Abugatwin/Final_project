
<?php
// Include the database connection file
include 'connection.php';

// Initialize variables for form fields
$date = '';
$numBirds = '';
$price = '';
$update = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If an update action is requested
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $numBirds = $_POST['numBirds'];
        $price = $_POST['price'];

        $sql = "UPDATE BirdsPurchase SET Date='$date', NumberOfBirds='$numBirds', Price='$price' WHERE BirdsPurchase_ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else { // If a new purchase is being added
        $date = $_POST['date'];
        $numBirds = $_POST['numBirds'];
        $price = $_POST['price'];

        $sql = "INSERT INTO BirdsPurchase (Date, NumberOfBirds, Price) VALUES ('$date', '$numBirds', '$price')";

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
    $result = $conn->query("SELECT * FROM BirdsPurchase WHERE BirdsPurchase_ID=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['Date'];
        $numBirds = $row['NumberOfBirds'];
        $price = $row['Price'];
    }
}

// Check if the delete action is triggered
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // Delete sales record from the database
    $sql = "DELETE FROM BirdsPurchase WHERE BirdsPurchase_ID=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>