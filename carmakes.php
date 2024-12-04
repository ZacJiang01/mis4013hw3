<?php 
require_once("util-db.php");
require_once("selectmanufacturer.php");

$pageTitle = "Car Makes";
include "view-header.php";
$carmakes = selectMakes();

include "view-carmanufacturer.php";
include "view-footer.php";
?>
