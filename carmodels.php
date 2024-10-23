<?php 
require_once("util-db.php");
require_once("selectmodels.php");

$pageTitle = "Car Models";
include "view-header.php";
$carmodels = selectModels();

include "view-carmodels.php";
include "view-footer.php";
?>
