<?php
require_once("model-manufacturers.php");

// Fetch manufacturers and their cars
try {
    $manufacturers = getManufacturersWithCars();
    $error_message = null;
} catch (Exception $e) {
    $manufacturers = [];
    $error_message = $e->getMessage();
}

// Include the view to display data
include "view-manufacturers.php";
?>
