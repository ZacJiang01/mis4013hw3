<?php 
require_once("util-db.php");
require_once("selectmanufacturer.php");

$pageTitle = "Manufacturer";
include "view-header.php";
$Manufacturer = selectManufacturer();

include "view-carmanufacturer.php";
include "view-footer.php";
?>
