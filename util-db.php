<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli(
'20.118.56.12', 'jian0040', 'Beans1310098965!!', 'mis4013hw3database');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
