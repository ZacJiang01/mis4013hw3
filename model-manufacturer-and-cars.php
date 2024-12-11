<?php
require_once("util-db.php");

function getManufacturersWithCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturers and their cars
        $query = "
            SELECT m.ManufacturerID, m.ManufacturerName, c.CarId, c.CarModel, c.Color, c.Price
            FROM Manufacturer m
            LEFT JOIN Car c ON m.ManufacturerID = c.ManufacturerID
            ORDER BY m.ManufacturerName, c.CarModel;
        ";

        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query execution failed: " . $conn->error);
        }

        // Organize results into an associative array
        $manufacturers = [];
        while ($row = $result->fetch_assoc()) {
            $manufacturers[$row['ManufacturerID']]['name'] = $row['ManufacturerName'];
            $manufacturers[$row['ManufacturerID']]['cars'][] = [
                'CarId' => $row['CarId'],
                'CarModel' => $row['CarModel'],
                'Color' => $row['Color'],
                'Price' => $row['Price']
            ];
        }

        $conn->close();
        return $manufacturers;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in getManufacturersWithCars: " . $e->getMessage());
        throw $e;
    }
}
?>
