<?php
include 'revenue_action.php'
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
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
       
</head>
<body>
    <div class="container">
        <div class="left">
            <!-- Chart container -->
            <div class="graph" >
                <canvas id="chart"></canvas>               
                
            </div>
        </div>
     
    </div>

    <script>        
       
        // Event listener for radio buttons
        document.querySelectorAll('input[name="timePeriod"]').forEach((radio) => {
            radio.addEventListener('change', (event) => {
                updateChart(event.target.value);
            });
        });

        // Initial chart data and options
        const chartData = {
            labels: <?php echo json_encode(array_column($sales, 'Date')); ?>,
            datasets: [
                {
                    label: 'Sales Revenue',
                    data: <?php echo json_encode(array_column($sales, 'Revenue')); ?>,
                    borderColor: "#FFCC08",
                    borderWidth: 2
                }
            ]
        };

        // Get chart canvas element
        const chartCanvas = document.getElementById('chart');
        const ctx = chartCanvas.getContext('2d');

        // Create chart
        const myChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                    display: true,
                }
            }
        });
    </script>
    <script src="./js/Dashboard.js"></script>
</body>
</html>
