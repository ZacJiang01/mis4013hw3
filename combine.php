<?php 
require_once("util-db.php");
require_once("selectcombined.php");

$pageTitle = "Manufacturers and Cars";
include "view-header.php";

try {
    // Fetch combined data
    $CombinedData = selectCombinedData();
    include "view-combined.php"; // Pass $CombinedData to the view
} catch (Exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

include "view-footer.php";
?>
