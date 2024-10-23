<?php
require_once("util-db.php");

function selectMakes() {
    try {
        $conn = get_db_connection();
        
        // Prepare and execute the SQL query to fetch car makes
        $stmt = $conn->prepare("SELECT make_id, make_name, make_country FROM car_make");
        
        // Execute the statement
        if (!$stmt->execute()) {
            throw new Exception("Query execution failed: " . $stmt->error);
        }
        
        // Get the result set from the query
        $result = $stmt->get_result();
        
        // Close the connection after use
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
        error_log("Error in selectMakes(): " . $e->getMessage());
        
        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
