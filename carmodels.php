<?php 
require_once("util-db.php");
require_once("selectmodels.php");

$pageTitle = "Car Models";
include "view-header.php";
$carmodels = selectCar Models();

include "view-instructors.php";
include "view-footer.php";
?>
