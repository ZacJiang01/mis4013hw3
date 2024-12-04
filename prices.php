<?php
require_once("util-db.php");

$pageTitle = "Car Prices";

// Query to get cars with manufacturer names, sorted by price
$conn = get_db_connection();
$query = "
    SELECT Car.CarID, Manufacturer.ManufacturerName, Car.CarModel, Car.Color, Car.Price 
    FROM Car
    JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
    ORDER BY Car.Price ASC
";
$result = $conn->query($query);

include "view-header.php";
?>
<h1>Car Prices</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Color</th>
        <th>Price</th>
        <th>Manufacturer</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['CarID']); ?></td>
            <td><?= htmlspecialchars($row['CarModel']); ?></td>
            <td><?= htmlspecialchars($row['Color']); ?></td>
            <td>$<?= number_format($row['Price'], 2); ?></td>
            <td><?= htmlspecialchars($row['ManufacturerName']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5">No cars found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
