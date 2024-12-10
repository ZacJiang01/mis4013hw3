<h1>Manufacturers</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>View Cars</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($Manufacturers && $Manufacturers->num_rows > 0) {
          while ($manufacturer_row = $Manufacturers->fetch_assoc()) {
      ?>
      <tr>
        <td><?php echo htmlspecialchars($manufacturer_row['ManufacturerID']); ?></td>
        <td><?php echo htmlspecialchars($manufacturer_row['ManufacturerName']); ?></td>
        <td>
        <a href="cars-by-manufacturers.php?id=<?php echo urlencode($manufacturer_row['ManufacturerID']); ?>">
          View Cars
          </a>

        </td>
      </tr>
      <?php
          }
      } else {
          echo "<tr><td colspan='3'>No manufacturers found or query failed.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
