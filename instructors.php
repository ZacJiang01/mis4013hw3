<?php 
require_once("util-db.php");
require_once("model-instructors.php");

$pageTitle = "Car Models";
include "view-header.php";
$instructors = selectCar Models();

include "view-instructors.php";
include "view-footer.php";
?>
