<?php 
require_once("util-db.php");
require_once("selectcar.php");

$pageTitle = "Car Models";
include "view-header.php";
$carmodels = selectModels();

include "view-carmodels.php";
include "view-footer.php";
?>
