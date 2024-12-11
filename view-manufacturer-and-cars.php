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
