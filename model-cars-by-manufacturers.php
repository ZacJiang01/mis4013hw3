<?php
function selectCarsByManufacturer($manufacturerId) {
    try {
        $conn = get_db_connection();

        // Prepare the query to fetch cars by manufacturer
        $stmt = $conn->prepare("
            SELECT CarId, CarModel, Color, Price, ManufacturerName
            FROM Car c
            JOIN Manufacturer m ON c.ManufacturerID = m.ManufacturerID
            WHERE m.ManufacturerID = ?
        ");

        // Bind the manufacturer ID as an integer
        $stmt->bind_param("i", $manufacturerId);

        // Execute the query
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        // Close the connection
        $stmt->close();
        $conn->close();

        return $result;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectCarsByManufacturer: " . $e->getMessage());
        throw $e;
    }
}
?>
