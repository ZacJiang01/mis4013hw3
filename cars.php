<?php 
require_once("util-db.php");
require_once("selectcars.php");

$pageTitle = "Cars";
include "view-header.php";
$Cars = selectCars();

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType'])) {
    case "Add";
      insertCars($_POST['cCarModel'], $_POST['cColor'], $_POST['cPrice']
          break;
  }
}
include "view-cars.php";
include "view-footer.php";
?>
