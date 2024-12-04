<h1>Manufacturers</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $manufacturers is a valid result set before fetching rows
    if ($manufacturers && $manufacturers->num_rows > 0) {
        while ($manufacturer_row = $manufacturers->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($manufacturer_row['ManufacturerID']); ?></td>
      <td><?php echo htmlspecialchars($manufacturer_row['ManufacturerName']); ?></td>
    </tr>
    <?php
        }
    } else {
        // If no manufacturers found or query failed
        echo "<tr><td colspan='2'>No manufacturers found or query failed.</td></tr>";
    }
    ?>
   </tbody>
  </table>
