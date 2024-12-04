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

        // Check if query execution was successful
        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
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
