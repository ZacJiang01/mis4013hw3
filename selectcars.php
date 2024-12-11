<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch only car details
        $query = "
            SELECT CarID, CarModel, Color, Price, ManufacturerName
            FROM car c join manufacturer m on c.ManufacturerID = m.ManufacturerID
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

function insertCar($CarModel, $Color, $Price) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO 'car' ('CarModel', 'Color', 'Price',) VALUES (?, ?, ?)");
        $stmt ->bind_param("ssi", $CarModel, $Color, $Price);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn ->close();
        throw $e;
        
    }
}
function updateCar($CarModel, $Color, $Price, $CarID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("Update 'car' set 'CarModel'= ?, 'Color' = ?, 'Price' = ?, where CarID = ?");
        $stmt ->bind_param("ssii", $CarModel, $Color, $Price, $CarID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn ->close();
        throw $e;
        
    }
}
function DeleteCar($CarID) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from car where CarID =?");
        $stmt ->bind_param("i", $CarID);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn ->close();
        throw $e;
        
    }
}
?>
