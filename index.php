<?php 
$pageTitle = "Home";
include "view-header.php";
?>
<div class="container my-5">
    <!-- Hero Section -->
    <div class="bg-light p-5 rounded text-center">
        <h1 class="display-4">Welcome to the Norman Car Dealership </h1>
        <p class="lead">Find the car of your dreams at unbeatable prices. Browse our collection of premium vehicles today!</p>
        <a href="cars.php" class="btn btn-primary btn-lg">View Inventory</a>
    </div>

  
    <!-- Contact Section -->
    <div class="bg-primary text-white text-center py-5 rounded">
        <h2>Contact Us</h2>
        <p>Have questions? Call us at <strong>(555) 123-4567</strong> or visit our dealership at <strong>123 Main Street, Anytown, USA</strong>.</p>
        <a href="contact.php" class="btn btn-light">Contact Us</a>
    </div>
</div>
<?php
include "view-footer.php";
?>
