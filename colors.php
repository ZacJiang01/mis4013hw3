<?php 
require_once("util-db.php");
require_once("selectcars.php");

$pageTitle = "Colors";
include "view-header.php";
$Cars = selectCars();

include "view-cars.php";
include "view-footer.php";
?>
