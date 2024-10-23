<?php
require_once("util-db.php");

function selectMotorcycleModels() {
    try {
        $conn = get_db_connection();
        
        // Prepare the SQL query to get motorcycle models and their make names via JOIN
        $stmt = $conn->prepare("
            SELECT motorcycle_model.model_id, motorcycle_model.model_name, motorcycle_model.model_year, motorcycle_make.make_name
            FROM motorcycle_model
            JOIN motorcycle_make ON motorcycle_model.make_id = motorcycle_make.make_id
        ");
        
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
        error_log("Error in selectMotorcycleModels(): " . $e->getMessage());
        
        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
