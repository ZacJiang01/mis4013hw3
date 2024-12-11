<div class = "row">
  <div class = "col">
    <h1>Cars</h1>
  </div>
  <div class = "col-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg>
  </div>
</div>

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
      <td>
   
      </td>
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
