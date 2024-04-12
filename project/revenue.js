document.addEventListener('DOMContentLoaded', function() {
    // Event listener for radio buttons
    document.querySelectorAll('input[name="timePeriod"]').forEach((radio) => {
        radio.addEventListener('change', (event) => {
            updateChart(event.target.value);
        });
    });

    // Initial chart data and options
    const chartData = {
        labels: <?php echo json_encode(array_column($sales, 'Date')); ?>,
        datasets: [{
            label: 'Sales Revenue',
            data: <?php echo json_encode(array_column($sales, 'Revenue')); ?>,
            borderColor: "#FFCC08",
            borderWidth: 2
        }]
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

    // Function to update chart based on selected time period
    function updateChart(period) {
        // Your logic to update the chart based on the selected time period
        // This function should modify the chartData object and update the chart
        // Example:
        if (period === 'week') {
            // Update chart data for week
            myChart.data.labels = <?php echo json_encode(array_column($sales, 'Date')); ?>;
            myChart.data.datasets[0].data = <?php echo json_encode(array_column($sales, 'Revenue')); ?>;
        }
        // Update the chart
        myChart.update();
    }
});
