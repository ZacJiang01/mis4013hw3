<div class = "row">
  <div class = "col">
    <h1>Manufacturer</h1>
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
         <td>
      <?php
      include "view-edit-functionality.php";
      ?>
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
