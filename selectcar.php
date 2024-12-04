<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();
        
        // Prepare the SQL query to get car details
        $stmt = $conn->prepare("SELECT CarID, CarModel, Color, Price FROM Car");
        
        // Execute the statement and check for errors
        if (!$stmt->execute()) {
            throw new Exception("Query execution failed: " . $stmt->error);
        }
        
        // Get the result set
        $result = $stmt->get_result();
        
        // Close the statement and connection
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
        error_log("Error in selectCars(): " . $e->getMessage());
        
        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
