<?php
// Include the database connection file
include 'connection.php';

// Initialize variables for form fields
$username = '';
$password = '';
$update = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If an update action is requested
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "UPDATE User SET Username='$username', Password='$password' WHERE User_ID=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else if (isset($_POST['save'])) { // If a new user record is being added
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO User (Username, Password) VALUES ('$username', '$password')";

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
    $result = $conn->query("SELECT * FROM User WHERE User_ID=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['Username'];
        $password = $row['Password'];
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM User WHERE User_ID=$id");

    echo "Record deleted successfully";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
     <!-- Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Poultry Farm Dashboard</title>
</head>
<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Poultry Farm </span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="Dashboard.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="production.php">
                    <i class='bx bxs-flask' ></i>
                    <span class="text">Production</span>
                </a>
            </li>
            <li>
                <a href="sale.php">
                    <i class='bx bxs-cart-add' ></i>
                    <span class="text">Sales</span>
                </a>
            </li>
            <li>
                <a href="purchase.php">
                    <i class='bx bxs-shopping-bag' ></i>
                    <span class="text">Purchase</span>
                </a>
            </li>
            <li>
                <a href="mortality.php">
                    <i class='bx bxs-skull' ></i>
                    <span class="text">Mortality rate</span>
                    
                </a>
            </li>
            <li>
                <a href="feed.php">
                    <i class='bx bxs-coin-stack' ></i>
                    <span class="text">Feed</span>
                </a>
            </li>
           
            <li>
            <a href="revenue.php">
            <i class='bx bxs-coin-stack' ></i>
                <span class="text">Revenue</span>
                </a>
                </li>
        </ul>
        <ul class="side-menu">
            <li>
            
            <li>
                <a href="login.php" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </section>
    <!-- SIDEBAR -->

    <div class="container">
        <h2>User Management</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-group">
                <?php if ($update === true) : ?>
                    <button type="submit" name="update">Update</button>
                <?php else : ?>
                    <button type="submit" name="save">Save</button>
                <?php endif; ?>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM User";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td><a href='user.php?edit=" . $row['User_ID'] . "'>Edit</a> | <a href='user.php?delete=" . $row['User_ID'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="../js/Dashboard.js"></script>

</body>

</html>