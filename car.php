<?php 
require_once("util-db.php");
require_once("selectcar.php");

$pageTitle = "Car Models";
include "view-header.php";
$Car = selectCar();

include "view-car.php";
include "view-footer.php";
?>
