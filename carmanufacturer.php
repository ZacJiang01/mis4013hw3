<?php
require_once("util-db.php");
require_once("selectmanufacturer.php");

$pageTitle = "Manufacturers";
include "view-header.php";

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            // Validate and sanitize inputs
            $manufacturerName = trim($_POST['ManufacturerName']);

            if (empty($manufacturerName)) {
                echo '<div class="alert alert-danger" role="alert">Manufacturer name is required.</div>';
            } else {
                if (!insertManufacturer($manufacturerName)) {
                    echo '<div class="alert alert-danger" role="alert">Error adding manufacturer.</div>';
                } else {
                    echo '<div class="alert alert-success" role="alert">New Manufacturer Added.</div>';
                }
            }
            break;

        case "Delete":
            // Handle delete manufacturer action
            $manufacturerID = intval($_POST['ManufacturerID']);
            if ($manufacturerID > 0 && deleteManufacturer($manufacturerID)) {
                echo '<div class="alert alert-success" role="alert">Manufacturer Deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error deleting manufacturer.</div>';
            }
            break;

        case "Edit":
            // Validate and sanitize inputs for update
            $manufacturerID = intval($_POST['ManufacturerID']);
            $manufacturerName = trim($_POST['ManufacturerName']);

            if (empty($manufacturerName) || $manufacturerID <= 0) {
                echo '<div class="alert alert-danger" role="alert">Valid Manufacturer ID and name are required.</div>';
            } else {
                if (updateManufacturer($manufacturerID, $manufacturerName)) {
                    echo '<div class="alert alert-success" role="alert">Manufacturer Updated Successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating manufacturer.</div>';
                }
            }
            break;
    }
}

// Fetch and display manufacturers
try {
    $manufacturers = selectManufacturer();
    include "view-carmanufacturer.php";
} catch (Exception $e) {
    echo "<p class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

include "view-footer.php";
?>
