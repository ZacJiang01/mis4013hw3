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

@@ -22,7 +24,7 @@ function selectManufacturer() {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectManufacturer(): " . $e->getMessage());
        throw $e;
    }
}
