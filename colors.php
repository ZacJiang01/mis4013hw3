<?php 
require_once("util-db.php");
require_once("selectColors.php");

$pageTitle = "Colors";
include "view-header.php";
$Cars = selectColors();

include "view-colors.php";
include "view-footer.php";
?>
