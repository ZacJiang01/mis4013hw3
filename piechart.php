<?php
require_once("util-db.php");

// Fetch data from the database and group cars by price range
function getCarPriceRanges() {
    try {
        $conn = get_db_connection();
        $query = "SELECT Price FROM car";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        // Initialize price range counts
        $ranges = [
            "< $20k" => 0,
            "$20k - $40k" => 0,
            "> $40k" => 0
        ];

        while ($row = $result->fetch_assoc()) {
            $price = $row['Price'];
            if ($price < 20000) {
                $ranges["< $20k"]++;
            } elseif ($price <= 40000) {
                $ranges["$20k - $40k"]++;
            } else {
                $ranges["> $40k"]++;
            }
        }

        $conn->close();
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
                colors: ['#4caf50', '#2196f3', '#f44336'],
                is3D: true
            };

            // Render the chart
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <h1>Car Price Range Pie Chart</h1>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
