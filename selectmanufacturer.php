<?php
require_once("util-db.php");

function selectManufacturer() {
    try {
        $conn = get_db_connection();

        // Query to fetch only car details
        $query = "
            SELECT ManufacturerID, ManufacturerName
            FROM Manufacturer
            ORDER BY ManufacturerName
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
        error_log("Error in selectManufacturer(): " . $e->getMessage());
        throw $e;
    }
}
?>
