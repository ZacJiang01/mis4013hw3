<?php
require_once("util-db.php");

function selectCars() {
    try {
        $conn = get_db_connection();

        // Prepare the SQL query to get car details
        $query = "SELECT CarID, CarModel, Color, Price FROM Car";
        $stmt = $conn->prepare($query);

        // Execute the statement and check for errors
        if (!$stmt->execute()) {
            throw new Exception("Query execution failed: " . $stmt->error);
        }

        // Get the result set
        $result = $stmt->get_result();

        // Check if the result is empty
        if ($result->num_rows === 0) {
            throw new Exception("No cars found in the Car table.");
        }

        // Fetch all rows and return as an array
        $cars = $result->fetch_all(MYSQLI_ASSOC);

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        return $cars;
    } catch (Exception $e) {
        // Close the connection in case of an error
        if (isset($conn)) {
            $conn->close();
        }

        // Log the error for debugging
        error_log("Error in selectCars(): " . $e->getMessage());

        // Rethrow the exception to be handled elsewhere
        throw $e;
    }
}
?>
