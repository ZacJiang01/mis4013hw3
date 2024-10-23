<?php
require_once("util-db.php");

function selectMotorcycleModels() {
    $conn = get_db_connection();
    
    // Prepare and execute the SQL query to get motorcycle models and their make names via JOIN
    $stmt = $conn->prepare("
        SELECT motorcycle_model.model_id, motorcycle_model.model_name, motorcycle_model.model_year, motorcycle_make.make_name
        FROM motorcycle_model
        JOIN motorcycle_make ON motorcycle_model.make_id = motorcycle_make.make_id
    ");
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
