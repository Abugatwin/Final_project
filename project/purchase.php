<?php
include 'purchase_action.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="./css/dashboard.css">
     <!-- Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Poultry Farm Dashboard</title>
    <Link rel="stylesheet" href="./css/purchase.css">
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

    <?php
    include 'stats.php'
    ?>

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            
            <a href="#" class="profile">
                <img src="./image/people.png">
            </a>
        </nav>

    <div class="container">
        <h2>Birds Purchase</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="date" value="<?php echo $date; ?>" required>
            </div>
            <div class="form-group">
                <label>Number of Birds:</label>
                <input type="number" name="numBirds" value="<?php echo $numBirds; ?>" required>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="number" step="0.01" name="price" value="<?php echo $price; ?>" required>
            </div>
            <div class="form-group">
            <?php if ($update === true) : ?>
                <button type="submit" name="update" class="edit-btn">Update</button>
            <?php else : ?>
                <button type="submit" name="save" class="edit-btn">Save</button>
            <?php endif; ?>
        </div>

        </form>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Number of Birds</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM BirdsPurchase";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>" . $row['NumberOfBirds'] . "</td>";
                        echo "<td>$" . $row['Price'] . "</td>";
                        echo "<td><a href='?edit=" . $row['BirdsPurchase_ID'] . "'>Edit</a> | <a href='?delete=" . $row['BirdsPurchase_ID'] . "' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<script src="./js/Dashboard.js"></script>

</body>

</html>
