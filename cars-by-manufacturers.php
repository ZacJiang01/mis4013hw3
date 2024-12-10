<?php 
require_once("util-db.php");
require_once("model-cars-by-manufacturers.php");

$pageTitle = "Cars";
include "view-header.php";
$Cars = selectCarsByManufacturers($_GET['id']);

include "view-cars-by-manufacturers.php";
include "view-footer.php";
?>
