<?php 
require_once("util-db.php");
require_once("selectmakes.php");

$pageTitle = "Car Makes";
include "view-header.php";
$carmakess = selectMakes();

include "view-carmakes.php";
include "view-footer.php";
?>
