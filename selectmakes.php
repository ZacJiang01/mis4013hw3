<?php
function selectMakes() {
    try {
        $conn = get_db_connection();
        
        // Correct the SQL query by removing single quotes around the table name
        $stmt = $conn->prepare("SELECT make_id, make_name, make_country FROM car_make");
        
        // Execute the statement
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Close the connection after use
        $conn->close();
        
        // Return the result
        return $result;
    } catch (Exception $e) {
        // Close the connection in case of an error
        if (isset($conn)) {
            $conn->close();
        }
        
        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
