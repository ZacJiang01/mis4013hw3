<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch car data with manufacturer details
        $query = "
            SELECT Car.CarID, Car.CarModel, Car.Color, Car.Price, Manufacturer.ManufacturerName
            FROM Car
            JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
            ORDER BY Car.CarID ASC
        ";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query execution failed: " . $conn->error);
        }

        return $result;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectCars(): " . $e->getMessage());
        throw $e;
    }
}
?>
