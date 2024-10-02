<?php
function get_db_connection() {
    // Create connection
    $conn = new mysqli(
        'mis4013hw3database.mysql.database.azure.com',
        'jian0040',
        'Beans1310098965!!',
        'my_database'
    );

    // Check connection
    if ($conn->connect_error) {
        // Log error message
        error_log("Connection failed: " . $conn->connect_error);
        return false; // or you can throw an exception
    }
    
    // Set character set to utf8mb4 for better Unicode support
    if (!$conn->set_charset("utf8mb4")) {
        error_log("Error loading character set utf8mb4: " . $conn->error);
    }

    return $conn;
}
?>
