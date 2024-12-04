<h1>Cars</h1>
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
    // Assuming $cars is the result set from the selectCars function
    if ($cars) {
        while ($car = $cars->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($car['CarID']); ?></td>
      <td><?php echo htmlspecialchars($car['CarModel']); ?></td>
      <td><?php echo htmlspecialchars($car['Color']); ?></td>
      <td><?php echo htmlspecialchars($car['Price']); ?></td>
      <td><?php echo htmlspecialchars($car['ManufacturerName']); ?></td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='5'>No cars found.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>
