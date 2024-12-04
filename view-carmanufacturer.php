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
      if ($Manufacturers && $Manufacturers->num_rows > 0) {
          while ($manufacturer_row = $Manufacturers->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($manufacturer_row['ManufacturerID']) . "</td>";
              echo "<td>" . htmlspecialchars($manufacturer_row['ManufacturerName']) . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='2'>No manufacturers found or query failed.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
