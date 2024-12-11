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
                    echo '<div class ="alert-danger" role ="alert">Error.</div>';
                } else {
                    echo '<div class = "alert alert-success" role ="alert">New Car Added.</div>';
                }
            }
            break;
       
        case "Delete":
            // Handle delete car action
            $carID = intval($_POST['CarID']);
            if (deleteCar($carID)) {
                $success_message = "Car deleted successfully.";
            } else {
                $error_message = "Error deleting car.";
            }
            break;

        default:
            $error_message = "Invalid action.";
    }
    
}
  
$Cars = selectCars();

include "view-cars.php";
include "view-footer.php";
?>
