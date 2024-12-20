<?php
require_once("util-db.php");

$pageTitle = "Car Prices";

// Determine sort order
$sortOrder = isset($_GET['sort']) && $_GET['sort'] === 'DESC' ? 'DESC' : 'ASC';

// Query to get cars with manufacturer names, sorted by price
$conn = get_db_connection();
$query = "
    SELECT Manufacturer.ManufacturerName, Car.CarID, Car.CarModel, Car.Color, Car.Price
    FROM Car
    JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
    ORDER BY Car.Price $sortOrder, Manufacturer.ManufacturerName $sortOrder
";
$result = $conn->query($query);

// Determine the next sort order for the button
$nextSortOrder = $sortOrder === 'ASC' ? 'DESC' : 'ASC';

include "view-header.php";
?>
<h1>Car Prices</h1>
<div class="mb-3">
  <!-- Sorting Button -->
  <a href="?sort=<?= $nextSortOrder; ?>" class="btn btn-primary">
    Sort by Price: <?= $sortOrder === 'ASC' ? 'Descending' : 'Ascending'; ?>
  </a>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Manufacturer</th>
        <th>ID</th>
        <th>Model</th>
        <th>Color</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['ManufacturerName']); ?></td>
            <td><?= htmlspecialchars($row['CarID']); ?></td>
            <td><?= htmlspecialchars($row['CarModel']); ?></td>
            <td><?= htmlspecialchars($row['Color']); ?></td>
            <td>$<?= number_format($row['Price'], 2); ?></td>
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
