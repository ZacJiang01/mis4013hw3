<?php 
require_once("util-db.php");
require_once("selectmotorcyclemodels.php");

$pageTitle = "Motorcycle Models";
include "view-header.php";

// Retrieve motorcycle models from the database
$motorcycle_models = selectMotorcycleModels();

include "view-motorcyclemodels.php";
include "view-footer.php";
?>
