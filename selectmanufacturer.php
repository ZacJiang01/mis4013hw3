<?php
require_once("util-db.php");

function selectManufacturer() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturer details
        $query = "
            SELECT ManufacturerID, ManufacturerName
            FROM Manufacturer
            ORDER BY ManufacturerID ASC
        ";
        $result = $conn->query($query);

        // Check if the query executed successfully
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
