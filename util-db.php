<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli(
'mis4013hw3database.mysql.database.azure.com', 'jian0040', 'Beans1310098965!!', 'my_database');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
