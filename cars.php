<?php 
require_once("util-db.php");
require_once("selectcars.php");

$pageTitle = "Cars";
include "view-header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            // Validate and sanitize inputs
            $carModel = trim($_POST['CarModel']);
            $color = trim($_POST['Color']);
            $price = floatval($_POST['Price']);

            if (empty($carModel) || empty($color) || $price <= 0) {
                $error_message = "All fields are required, and price must be a positive number.";
            } else {
                if (!insertCar($carModel, $color, $price)) {
                    $error_message = "Failed to add car.";
                } else {
                    $success_message = "Car added successfully!";
                }
            }
            break;
    }
}
  
$Cars = selectCars();

include "view-cars.php";
include "view-footer.php";
?>
