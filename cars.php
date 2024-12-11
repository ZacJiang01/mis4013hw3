<?php 
require_once("util-db.php");
require_once("selectcars.php");

$pageTitle = "Cars";
include "view-header.php";

if (isset($_POST['actiontType'])) {
switch ($_POST['actionType']) {
  case "Add":
  insertCar($_POST['CarModel'], $_POST['Color'], $_POST['Price']);
  break;
  }
}
  
$Cars = selectCars();

include "view-cars.php";
include "view-footer.php";
?>
