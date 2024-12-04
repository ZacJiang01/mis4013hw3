<?php
require_once("util-db.php");

function selectCombinedData() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturers and their cars
        $query = "
            SELECT Manufacturer.ManufacturerID, Manufacturer.ManufacturerName, 
                   Car.CarID, Car.CarModel, Car.Color, Car.Price
            FROM Manufacturer
            LEFT JOIN Car ON Manufacturer.ManufacturerID = Car.ManufacturerID
            ORDER BY Manufacturer.ManufacturerName ASC, Car.CarID ASC
        ";
        $result = $conn->query($query);

        // Debugging output
        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($result->num_rows === 0) {
            die("No manufacturers or cars found in the database.");
        }

        return $result;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectCombinedData(): " . $e->getMessage());
        throw $e;
    }
}
?>
