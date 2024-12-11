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
        error_log("Error fetching car price ranges: " .
