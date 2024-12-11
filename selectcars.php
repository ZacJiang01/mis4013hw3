<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch car details
        $query = "
            SELECT CarID, CarModel, Color, Price
            FROM car c
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

function deleteCar($CarID) {
    try {
        if ($CarID <= 0) {
            throw new Exception("Invalid CarID: " . $CarID);
        }

        $conn = get_db_connection();

        $stmt = $conn->prepare("DELETE FROM car WHERE CarID = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("i", $CarID);

        if (!$stmt->execute()) {
            throw new Exception("Failed to execute delete query: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();

        return true;
    } catch (Exception $e) {
        if (isset($conn) && $conn->ping()) {
            $conn->close();
        }
        error_log("Error in deleteCar(): " . $e->getMessage());
        return false;
    }
}


function updateCar($CarModel, $Color, $Price, $CarID) {
    try {
        $conn = get_db_connection();

        $stmt = $conn->prepare("
            UPDATE car
            SET CarModel = ?, Color = ?, Price = ?
            WHERE CarID = ?
        ");
        $stmt->bind_param("ssdi", $CarModel, $Color, $Price, $CarID);

        $success = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $success;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in updateCar(): " . $e->getMessage());
        throw $e;
    }
}


?>
