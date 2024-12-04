<?php
require_once("util-db.php");

$pageTitle = "Car Colors";

// Query to get cars grouped by color in alphabetical order
$conn = get_db_connection();
$query = "
    SELECT Car.Color, Car.CarModel, Manufacturer.ManufacturerName, Car.Price
    FROM Car
    JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
    ORDER BY Car.Color ASC, Car.CarModel ASC
";
$result = $conn->query($query);

include "view-header.php";
?>
<h1>Car Colors</h1>
<div class="table-responsive">
  <?php if ($result && $result->num_rows > 0): ?>
    <?php 
    $currentColor = null; 
    while ($row = $result->fetch_assoc()): 
        if ($row['Color'] !== $currentColor): 
            if ($currentColor !== null): ?>
              </tbody></table>
            <?php endif; ?>
            <h2><?= htmlspecialchars($row['Color']); ?></h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Model</th>
                  <th>Manufacturer</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
            <?php 
            $currentColor = $row['Color']; 
        endif; 
        ?>
        <tr>
          <td><?= htmlspecialchars($row['CarModel']); ?></td>
          <td><?= htmlspecialchars($row['ManufacturerName']); ?></td>
          <td>$<?= number_format($row['Price'], 2); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
    </table>
  <?php else: ?>
    <p>No cars found.</p>
  <?php endif; ?>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
