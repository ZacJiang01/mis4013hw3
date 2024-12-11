<?php
require_once("util-db.php");

// Fetch data from the database and group cars by price range in increments of $10,000
function getCarPriceRanges() {
    try {
        $conn = get_db_connection();
        $query = "SELECT Price FROM car";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        // Initialize price range counts
        $ranges = [];
        $step = 10000;

        while ($row = $result->fetch_assoc()) {
            $price = $row['Price'];
            $rangeIndex = intval($price / $step) * $step;

            $rangeLabel = ($rangeIndex < 100000) 
                ? "$" . number_format($rangeIndex) . " - $" . number_format($rangeIndex + $step - 1) 
                : "> $100,000";

            if (!isset($ranges[$rangeLabel])) {
                $ranges[$rangeLabel] = 0;
            }
            $ranges[$rangeLabel]++;
        }

        $conn->close();
        ksort($ranges); // Sort ranges by price for consistent display
        return $ranges;
    } catch (Exception $e) {
        error_log("Error fetching car price ranges: " . $e->getMessage());
        return null;
    }
}

$priceRanges = getCarPriceRanges();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Price Range Pie Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load Google Charts
        google.charts.load('current', {'packages':['corechart']});

        // Draw the chart when the page is loaded
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Prepare the data
            var data = google.visualization.arrayToDataTable([
                ['Price Range', 'Count'],
                <?php
                if ($priceRanges) {
                    foreach ($priceRanges as $range => $count) {
                        echo "['$range', $count],";
                    }
                }
                ?>
            ]);

            // Chart options
            var options = {
                title: 'Car Price Ranges',
                pieHole: 0.4,
                colors: ['#4caf50', '#2196f3', '#f44336', '#ff9800', '#9c27b0', '#00bcd4', '#8bc34a'],
                chartArea: { width: '80%', height: '80%' }
            };

            // Render the chart
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="display-4">Car Price Range Distribution</h1>
            <p class="lead">Visual representation of cars grouped by price ranges.</p>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
</body>
</html>
