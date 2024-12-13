<?php
require_once("util-db.php");

function selectManufacturer() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturer details
        $query = "
            SELECT ManufacturerID, ManufacturerName
            FROM Manufacturer
            ORDER BY ManufacturerName
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
        error_log("Error in selectManufacturer(): " . $e->getMessage());
        throw $e;
    }
}
function insertManufacturer($ManufacturerName) {
    try {
        $conn = get_db_connection();

        $stmt = $conn->prepare("
            INSERT INTO manufacturer (ManufacturerName)
            VALUES (?)
        ");
        $stmt->bind_param("s", $Manufacturer);

        $success = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $success;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in insertManufacturer(): " . $e->getMessage());
        throw $e;
    }
}

function updateManufacturer($ManufacturerName) {
    try {
        $conn = get_db_connection();

        $stmt = $conn->prepare("
            UPDATE Manufacturer
            SET ManufacturerName = ?
            WHERE manufacturerID = ?
        ");
        $stmt->bind_param("s", $ManufacturerName);

        $success = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $success;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in updateManufacturer(): " . $e->getMessage());
        throw $e;
    }
}

function deleteCar($ManufacturerID) {
    try {
        if ($ManufacturerID <= 0) {
            throw new Exception("Invalid ManufacturerID: " . $ManufacturerID);
        }

        $conn = get_db_connection();

        $stmt = $conn->prepare("DELETE FROM manufacturer WHERE ManufacturerID = ?");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("i", $ManufacturerID);

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
        error_log("Error in deleteManufacturer(): " . $e->getMessage());
        return false;
    }
}
?>
