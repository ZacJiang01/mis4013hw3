<?php 
require_once("util-db.php");
require_once("model-cars-by-manufacturers.php");

try {
    $manufacturerId = 1; // Replace with an existing ManufacturerID from your database
    $result = selectCarsByManufacturer($manufacturerId);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            print_r($row); // Output each row for debugging
        }
    } else {
        echo "No cars found for ManufacturerID: " . $manufacturerId;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
