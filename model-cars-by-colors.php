<?php
function selectCarsByColors($color) {
    try {
        $conn = get_db_connection();

        // Prepare the query to fetch cars by color
        $stmt = $conn->prepare("
            SELECT CarId, CarModel, Color, Price, ManufacturerName
            FROM Car c
            JOIN Manufacturer m ON c.ManufacturerID = m.ManufacturerID
            WHERE Color = ?
        ");

        // Bind the color as a string
        $stmt->bind_param("s", $color);

        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("SQL Error: " . $stmt->error);
        }

        // Get the result set
        $result = $stmt->get_result();

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        return $result;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in selectCarsByColors: " . $e->getMessage());
        throw $e;
    }
}
?>
