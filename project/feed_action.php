<?php
include 'connection.php';

$date = '';
$quantity = '';
$price = '';
$update = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $quantity = $_POST['Quantity'];
        $price = $_POST['price'];

        $sql = "UPDATE FeedPurchase SET Date='$date', Quantity='$quantity', Price='$price' WHERE FeedPurchase_ID=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $date = $_POST['date'];
        $quantity = $_POST['Quantity'];
        $price = $_POST['price'];

        $sql = "INSERT INTO FeedPurchase (Date, Quantity, Price) VALUES ('$date', '$quantity', '$price')";

        if ($conn->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error creating record: " . $conn->error;
        }
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM FeedPurchase WHERE FeedPurchase_ID=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date = $row['Date'];
        $quantity = $row['Quantity'];
        $price = $row['Price'];
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM FeedPurchase WHERE FeedPurchase_ID=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
