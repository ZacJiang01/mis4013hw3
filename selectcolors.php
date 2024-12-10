<?php
require_once("util-db.php");

function selectColors() {
    try {
        $conn = get_db_connection();

        // Query to fetch only car details
        $query = "
            SELECT Distinct Color
            FROM car 
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
        error_log("Error in selectColors(): " . $e->getMessage());
        throw $e;
    }
}
?>
