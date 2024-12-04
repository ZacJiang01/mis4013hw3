<?php 
require_once("util-db.php");
require_once("selectcombined.php");

$pageTitle = "Manufacturers and Cars";
include "view-header.php";

try {
    // Fetch combined data of manufacturers and cars
    $CombinedData = selectCombinedData();
    // Include the view to render the data
    include "view-combined.php";
} catch (Exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

include "view-footer.php";
?>
