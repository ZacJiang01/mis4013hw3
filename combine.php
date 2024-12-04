<?php 
require_once("util-db.php");
require_once("selectcombined.php");

$pageTitle = "Manufacturers and Cars";
include "view-header.php";

try {
    $CombinedData = selectCombinedData();
    include "view-combined.php";
} catch (Exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

include "view-footer.php";
?>
