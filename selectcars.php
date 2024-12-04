<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch only car details
        $query = "
            SELECT CarID, CarModel, Color, Price
            FROM Car
            ORDER BY CarID ASC
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
