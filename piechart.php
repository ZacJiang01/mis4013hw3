<?php
require_once("util-db.php");

// Set the page title
$pageTitle = "Car Price Range Pie Chart";

// Fetch data from the database
function getCarPriceRanges() {
    try {
        $conn = get_db_connection();
        $query = "SELECT Price FROM car";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

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
        ksort($ranges);
        return $ranges;
    } catch (Exception $e) {
        error_log("Error fetching car price ranges: " . $e->getMessage());
        return null;
    }
}

$priceRanges = getCarPriceRanges();

include "view-header.php";
?>

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-4">Car Price Range Distribution</h1>
        <p class="lead">Visual representation of cars grouped by price ranges.</p>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
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

                    var options = {
                        title: 'Car Price Ranges',
                        pieHole: 0.4,
                        colors: ['#4caf50', '#2196f3', '#f44336', '#ff9800', '#9c27b0', '#00bcd4', '#8bc34a'],
                        chartArea: { width: '80%', height: '80%' }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
            <div id="piechart" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
</div>

<?php include "view-footer.php"; ?>
