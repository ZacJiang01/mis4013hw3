<?php 
require_once("util-db.php");
require_once("selectmotorcyclemakes.php");

$pageTitle = "Motorcycle Makes";
include "view-header.php";

// Retrieve motorcycle makes from the database
$motorcycle_makes = selectMotorcycleMakes();

include "view-motorcyclemakes.php";
include "view-footer.php";
?>
