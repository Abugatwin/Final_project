<?php
include 'select.php'

?>,

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
       <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="./css/dashboard.css">
    <title>Poultry Farm Dashboard</title>
</head>
<body>
<?php
include 'piechart.php'
?>

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

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->       
            <nav>
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="search.php" method="GET"> <!-- Modified action -->
                <div class="form-input">
                    <input type="search" name="q" placeholder="Search..."> <!-- Modified input with name attribute -->
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
           
            <a href="#" class="profile">
                <img src="./image/people.png">
            </a>
        </nav>
<!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Poultry Farm Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="Dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="Dashboard.php">Home</a>
                        </li>
                    </ul>
                </div>
                                
                <img src="./image/chicken.png" alt="Chicken" width="100" height="100">                    
                </a>
            </div>

            <!-- Statistics Boxes -->
            <div class="statistics">
                <div class="stat-box">
                    <h2>No of birds</h2>
                    <p><?php echo $totalBirds; ?></p>
                </div>
                <div class="stat-box">
                    <h2>Mortality rate</h2>
                    <p><?php echo $avgMortalityRate; ?></p>
                </div>
                <div class="stat-box">
                    <h2>No of eggs</h2>
                    <p><?php echo $totalEggs; ?></p>
                </div>
                
            </div>
            <br>


        </br>
        <br>

            
        </br>
            <!-- End of Statistics Boxes -->
            
      <!-- Create a canvas element for the pie chart -->
      <div class="charts">
<canvas id="pieChart" width="400" height="400"></canvas>
</div>


<script>

  // Parse the JSON data
    const data = <?php echo $jsonData; ?>;

    // Extract values from the data
    const totalLiveBirds = data.totalLiveBirds;
    const totalDeathBirds = data.totalDeathBirds;
    const totalSales = data.totalSales;
    const eggsLeft = data.eggsLeft;

    // Create data for the pie chart
    const pieChartData = {
        labels: ['Live Birds', 'Death Birds',  'Eggs Left'], // Added 'Eggs Left' label
        datasets: [{
            label: 'Pie Chart',
            data: [totalLiveBirds, totalDeathBirds,  eggsLeft], // Added eggsLeft value
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)', // Live Birds
                'rgba(54, 162, 235, 0.5)', // Death Birds
               
                'rgba(255, 255, 0, 0.5)'    // Eggs Left (Yellow)
            ]
        }]
    };

    // Configure and render the pie chart
    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: pieChartData,
        options: {
            responsive: false,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Pie Chart'
            },
            tooltips: {
                intersect: true,
                mode: 'index'
            }
        }
    });   
    
</script>



<script src="./js/Dashboard.js"></script>
<script src="./js/search.js"></script>

</body>
</html>
