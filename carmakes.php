<?php 
require_once("util-db.php");
require_once("selectmakes.php");

$pageTitle = "Car Makes";
include "view-header.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle adding a new car make
    if (isset($_POST['add_make'])) {
        $make_name = $_POST['make_name'];
        $make_country = $_POST['make_country'];
        addMake($make_name, $make_country);  // Assuming an addMake function in model-courses.php
    }
    // Handle editing a car make
    if (isset($_POST['edit_make'])) {
        $make_id = $_POST['make_id'];
        $make_name = $_POST['make_name'];
        $make_country = $_POST['make_country'];
        editMake($make_id, $make_name, $make_country);  // Assuming an editMake function in model-courses.php
    }
}
// Handle deleting a car make
if (isset($_GET['delete_make'])) {
    $make_id = $_GET['delete_make'];
    deleteMake($make_id);  // Assuming a deleteMake function in model-courses.php
}
$makes = selectMakes();  // Fetch all car makes

include "view-carmakes.php";  // Show the view for displaying car makes
include "view-footer.php";
?>
