<?php 
require_once("util-db.php");
require_once("model-cars-by-colors.php");

$pageTitle = "Cars by Colors";
include "view-header.php";
$Cars = selectCarsByColors($POST['cid']);

include "view-cars-by-colors.php";
include "view-footer.php";
?>
