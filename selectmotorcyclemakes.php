<?php
require_once("util-db.php");

function selectMotorcycleMakes() {
    $conn = get_db_connection();
    
    // Prepare and execute the SQL query to get motorcycle makes
    $stmt = $conn->prepare("SELECT make_id, make_name, make_country FROM motorcycle_make");
    $stmt->execute();
    
    // Get the result set from the query
    $result = $stmt->get_result();
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    
    // Return the result set
    return $result;
}
?>
