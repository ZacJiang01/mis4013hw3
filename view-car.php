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
    require_once("util-db.php");

    // Fetch car data with manufacturers
    $conn = get_db_connection();
    $query = "
        SELECT Car.CarID, Car.CarModel, Car.Color, Car.Price, Manufacturer.ManufacturerName
        FROM Car
        JOIN Manufacturer ON Car.ManufacturerID = Manufacturer.ManufacturerID
        ORDER BY Car.CarID ASC
    ";
    $result = $conn->query($query);

    // Check if the query returned any results
    if ($result && $result->num_rows > 0) {
        while ($car_row = $result->fetch_assoc()) {
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
        // If no cars found or query failed
        echo "<tr><td colspan='5'>No cars found or query failed.</td></tr>";
    }

    // Close the database connection
    $conn->close();
    ?>
   </tbody>
  </table>
</div>
