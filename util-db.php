<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
