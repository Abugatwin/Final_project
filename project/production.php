<?php
include 'production_action.php'
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
    <link rel="stylesheet" href="./css/produc.css">
     <!-- Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Poultry Farm Dashboard</title>
    <style>
        /* Container Styles */
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        /* Form Styles */
        form {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Button Styles */
        .edit-btn {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
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
        <h2>Production</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="date" value="<?php echo $date; ?>" required>
            </div>
            <div class="form-group">
                <label>Number of Eggs:</label>
                <input type="number" name="NumEggs" value="<?php echo $NumEggs; ?>" required>
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
                    <th>Number of Eggs</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Production";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>" . $row['NumberOfEggs'] . "</td>";
                        echo "<td><a href='?edit=" . $row['Production_ID'] . "'>Edit</a> | <a href='?delete=" . $row['Production_ID'] . "' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
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
