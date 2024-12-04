<?php 
require_once("util-db.php");
require_once("selectmanufacturer.php");

$pageTitle = "Manufacturer";
include "view-header.php";
$carmakes = selectMakes();

include "view-carmanufacturer.php";
include "view-footer.php";
?>
