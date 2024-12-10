<?php
// Database connection
require_once 'db_connection.php';

// Get the manufacturer from the query string
$manufacturer = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '';

if ($manufacturer) {
    // Fetch cars by the manufacturer
    $stmt = $conn->prepare("SELECT * FROM car WHERE Manufacturer = ?");
    $stmt->bind_param("s", $manufacturer);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars by Manufacturer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Cars by <?php echo htmlspecialchars($manufacturer); ?></h1>
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
      <?php
      if ($result && $result->num_rows > 0) {
          while ($car_row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?php echo htmlspecialchars($car_row['CarID']); ?></td>
        <td><?php echo htmlspecialchars($car_row['CarModel']); ?></td>
        <td><?php echo htmlspecialchars($car_row['Color']); ?></td>
        <td>$<?php echo number_format($car_row['Price'], 2); ?></td>
      </tr>
      <?php
          }
      } else {
          echo "<tr><td colspan='4'>No cars found for this manufacturer.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
