<?php 
require_once("util-db.php");
require_once("selectmanufacturer.php");

$pageTitle = "Manufacturers";
include "view-header.php";

try {
    // Fetch manufacturers
    $Manufacturers = selectManufacturer();

    // Include the view to display the data
    include "view-carmanufacturer.php";
} catch (Exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

include "view-footer.php";
?>
