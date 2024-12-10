<?php
function SelectCarsByManufacturers($iid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT CarId, CarModel, Color, Price, FROM Car c join manufacturer m on c.manufacturerid = m.manufacturerid where carid=?");
        $stmt->bind_param("id", $iid);
        $stmt-?execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
        } catch (Exception $e) {
            $conn->close();
            throw $e;
            }
}
?>
        
