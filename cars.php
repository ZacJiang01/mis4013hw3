<?php 
require_once("util-db.php");
require_once("selectcars.php");

$pageTitle = "Cars";
include "view-header.php";


if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add";
      insertCars($_POST['cCarModel'], $_POST['cColor'], $_POST['cPrice']);
          break;
  }
}
$Cars = selectCars();
include "view-cars.php";
include "view-footer.php";
?>
