<?php
require_once("util-db.php");

function selectManufacturer() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturer details
        $query = "
            SELECT ManufacturerID, ManufacturerName
            FROM Manufacturer
            ORDER BY ManufacturerName ASC
        ";
        $result = $conn->query($query);

        // Debugging output
        if (!$result) {
            die("Query failed: " . $conn->error); // Display query error
        }

        if ($result->num_rows === 0) {
            die("No manufacturers found in the database."); // Display empty result message
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
