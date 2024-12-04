<?php
require_once("util-db.php");

$pageTitle = "Car Colors";

// Query to get distinct car colors with manufacturers
$conn = get_db_connection();
$query = "
    SELECT DISTINCT Car.Color, GROUP_CONCAT(DISTINCT Manufacturer.ManufacturerName SEPARATOR ', ') AS Manufacturers
    FROM Car
    JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
    GROUP BY Car.Color
    ORDER BY Car.Color ASC
";
$result = $conn->query($query);

include "view-header.php";
?>
<h1>Car Colors</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Color</th>
        <th>Manufacturers</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['Color']); ?></td>
            <td><?= htmlspecialchars($row['Manufacturers']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="2">No colors found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
