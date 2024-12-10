<h1>Cars by Colors</h1>
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
      if ($Cars && $Cars->num_rows > 0) {
          while ($car_row = $Cars->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($car_row['CarId']) . "</td>";
              echo "<td>" . htmlspecialchars($car_row['CarModel']) . "</td>";
              echo "<td>" . htmlspecialchars($car_row['Color']) . "</td>";
              echo "<td>$" . number_format($car_row['Price'], 2) . "</td>";
              echo "<td>" . htmlspecialchars($car_row['ManufacturerName']) . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No cars found for this color.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
