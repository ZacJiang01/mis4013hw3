
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
<div class = "row">
  <div class = "col">
  </div>
  <div class = "col-auto">
  <?php
include "view-add-functionality.php";
?>
  </div>
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
              <td>
      <?php
      include "view-edit-functionality.php";
      ?>
      </td>
                <td>
          <form method = "post" action ="">
          <input type = "hidden" name = "CarID" value ="<?php echo htmlspecialchars($car_row['CarID']); ?>">
            <input type ="hidden" name="actionType" value ="Delete">
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
        </svg>
      </td>
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
