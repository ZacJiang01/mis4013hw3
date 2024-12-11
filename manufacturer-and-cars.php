<?php
include"view-header.php";
require_once("util-db.php");

function getManufacturersWithCars() {
    try {
        $conn = get_db_connection();

        // Query to fetch manufacturers and their cars
        $query = "
            SELECT m.ManufacturerID, m.ManufacturerName, c.CarId, c.CarModel, c.Color, c.Price
            FROM Manufacturer m
            LEFT JOIN Car c ON m.ManufacturerID = c.ManufacturerID
            ORDER BY m.ManufacturerName, c.CarModel;
        ";

        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query execution failed: " . $conn->error);
        }

        // Organize results into an associative array
        $manufacturers = [];
        while ($row = $result->fetch_assoc()) {
            $manufacturers[$row['ManufacturerID']]['name'] = $row['ManufacturerName'];
            $manufacturers[$row['ManufacturerID']]['cars'][] = [
                'CarId' => $row['CarId'],
                'CarModel' => $row['CarModel'],
                'Color' => $row['Color'],
                'Price' => $row['Price']
            ];
        }

        $conn->close();
        return $manufacturers;
    } catch (Exception $e) {
        if (isset($conn)) {
            $conn->close();
        }
        error_log("Error in getManufacturersWithCars: " . $e->getMessage());
        throw $e;
    }
}

// Fetch manufacturers and their cars
try {
    $manufacturers = getManufacturersWithCars();
} catch (Exception $e) {
    $manufacturers = [];
    $error_message = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers and Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center">Manufacturers and Cars</h1>

    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
    <?php elseif (!empty($manufacturers)): ?>
        <div class="row">
            <?php foreach ($manufacturers as $manufacturer): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo htmlspecialchars($manufacturer['name']); ?></h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($manufacturer['cars'])): ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($manufacturer['cars'] as $car): ?>
                                        <li class="list-group-item">
                                            <strong>Model:</strong> <?php echo htmlspecialchars($car['CarModel']); ?><br>
                                            <strong>Color:</strong> <?php echo htmlspecialchars($car['Color']); ?><br>
                                            <strong>Price:</strong> $<?php echo number_format($car['Price'], 2); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-muted">No cars available for this manufacturer.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center">No manufacturers or cars found.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
