<?php 
require_once("util-db.php");
require_once("model-cars-by-manufacturers.php");

$pageTitle = "Cars by Manufacturer";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Manufacturer ID.");
}

$manufacturerId = (int) $_GET['id'];

// Fetch cars by manufacturer
$Cars = selectCarsByManufacturer($manufacturerId);

include "view-header.php";
include "view-cars-by-manufacturers.php";
include "view-footer.php";

?>
