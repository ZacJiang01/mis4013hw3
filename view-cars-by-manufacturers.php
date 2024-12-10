<h1>Cars by Manufacturers</h1>
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
    <?php
    // Check if $Cars is a valid result set before fetching rows
    if ($Cars && $Cars->num_rows > 0) {
        while ($car_row = $Cars->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($car_row['CarID']); ?></td>
      <td><?php echo htmlspecialchars($car_row['CarModel']); ?></td>
      <td><?php echo htmlspecialchars($car_row['Color']); ?></td>
      <td>$<?php echo number_format($car_row['Price'], 2); ?></td>
      <td><?php echo htmlspecialchars($car_row['ManufacturerName']); ?></td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='5'>No cars found or query failed.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>
