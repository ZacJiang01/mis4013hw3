<?php
// Make sure to include the necessary file to define selectMakes()
require_once("selectmakes.php");

// Call selectMakes to retrieve the car makes from the database
$car_makes = selectMakes();

// Include the view file to display the car makes
include 'view-carmakes.php';
?>
