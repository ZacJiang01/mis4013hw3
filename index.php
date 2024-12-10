<?php 
$pageTitle = "Home";
include "view-header.php";
?>
<div class="container my-5">
    <!-- Hero Section -->
    <div class="bg-light p-5 rounded text-center">
        <h1 class="display-4">Welcome to [Your Dealership Name]</h1>
        <p class="lead">Find the car of your dreams at unbeatable prices. Browse our collection of premium vehicles today!</p>
        <a href="cars.php" class="btn btn-primary btn-lg">View Inventory</a>
    </div>

    <!-- Featured Cars Section -->
    <div class="my-5">
        <h2 class="text-center mb-4">Featured Cars</h2>
        <div class="row">
            <!-- Car Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/car1.jpg" class="card-img-top" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">2024 Toyota Camry</h5>
                        <p class="card-text">Color: White<br>Price: $25,000</p>
                        <a href="car-details.php?id=1" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Car Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/car2.jpg" class="card-img-top" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">2024 Ford Mustang</h5>
                        <p class="card-text">Color: Red<br>Price: $35,000</p>
                        <a href="car-details.php?id=2" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Car Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/car3.jpg" class="card-img-top" alt="Car 3">
                    <div class="card-body">
                        <h5 class="card-title">2024 Honda Civic</h5>
                        <p class="card-text">Color: Blue<br>Price: $22,000</p>
                        <a href="car-details.php?id=3" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
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
