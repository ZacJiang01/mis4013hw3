<?php
require_once("util-db.php");

$pageTitle = "Car Prices";

// Query to get cars sorted by price
$conn = get_db_connection();
$query = "SELECT CarID, CarModel, Color, Price FROM Car ORDER BY Price ASC";
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
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="4">No cars found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
