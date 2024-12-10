<?php 
require_once("util-db.php");
require_once("model-cars-by-colors.php");

$pageTitle = "Cars by Colors";
include "view-header.php";

// Check if the color ID is provided
if (isset($_POST['cid']) && !empty($_POST['cid'])) {
    // Sanitize and validate input
    $color = trim($_POST['cid']);

    // Fetch cars by color
    try {
        $Cars = selectCarsByColors($color);
    } catch (Exception $e) {
        $Cars = null;
        $error_message = "Error fetching cars: " . $e->getMessage();
    }
} else {
    $Cars = null;
    $error_message = "No color specified.";
}

include "view-cars-by-colors.php";
include "view-footer.php";
?>
