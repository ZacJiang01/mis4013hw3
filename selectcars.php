<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch only car details
        $query = "
            SELECT CarID, CarModel, Color, Price
            FROM Car
            ORDER BY CarID ASC
        ";
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query execution failed: " . $conn->error);
        }

        return $result;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectCars(): " . $e->getMessage());
        throw $e;
    }
}

function insertCars($cCarModel, $cColor, $cPrice) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO 'car' ('carmodel, 'color', 'price',) VALUES (?, ?, ?)");
        $stmt ->bind_param("ss", $cCarModel, $cColorm $cPrice);
        $success = stmt -?execute();
        $conn ->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
