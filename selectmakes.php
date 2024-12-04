<?php
require_once("util-db.php");

function selectManufacturer() {
    try {
        $conn = get_db_connection();
        
        // Prepare and execute the SQL query to fetch manufacturers
        $stmt = $conn->prepare("SELECT ManufacturerID, ManufacturerName FROM Manufacturer");
        
        // Execute the statement
        if (!$stmt->execute()) {
            throw new Exception("Query execution failed: " . $stmt->error);
        }
        
        // Get the result set from the query
        $result = $stmt->get_result();
        
        // Close the statement and connection after use
        $stmt->close();
        $conn->close();
        
        // Return the result set
        return $result;
    } catch (Exception $e) {
        // Close the connection in case of an error
        if (isset($conn)) {
            $conn->close();
        }
        
        // Log the error for debugging
        error_log("Error in selectManufacturer(): " . $e->getMessage());
        
        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
