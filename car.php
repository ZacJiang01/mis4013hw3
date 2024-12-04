<?php 
require_once("util-db.php");

try {
    $cars = selectCars();
    foreach ($cars as $car) {
        echo "ID: " . htmlspecialchars($car['CarID']) . ", ";
        echo "Model: " . htmlspecialchars($car['CarModel']) . ", ";
        echo "Color: " . htmlspecialchars($car['Color']) . ", ";
        echo "Price: $" . htmlspecialchars(number_format($car['Price'], 2)) . "<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$pageTitle = "Car Models";
include "view-header.php";
$Car = selectCar();

include "view-car.php";
include "view-footer.php";
?>
