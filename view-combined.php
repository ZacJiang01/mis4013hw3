<h1>Manufacturers and Their Cars</h1>
<div class="table-responsive">
  <?php
  $currentManufacturer = null;

  if ($CombinedData && $CombinedData->num_rows > 0):
      while ($row = $CombinedData->fetch_assoc()):
          // Start a new table for a new manufacturer
          if ($row['ManufacturerName'] !== $currentManufacturer):
              if ($currentManufacturer !== null): ?>
                  </tbody></table>
              <?php endif; ?>
              <h2><?= htmlspecialchars($row['ManufacturerName']); ?></h2>
              <table class="table">
                  <thead>
                      <tr>
                          <th>Car ID</th>
                          <th>Model</th>
                          <th>Color</th>
                          <th>Price</th>
                      </tr>
                  </thead>
                  <tbody>
              <?php 
              $currentManufacturer = $row['ManufacturerName'];
          endif;

          // Add car data if available
          if ($row['CarID']): ?>
              <tr>
                  <td><?= htmlspecialchars($row['CarID']); ?></td>
                  <td><?= htmlspecialchars($row['CarModel']); ?></td>
                  <td><?= htmlspecialchars($row['Color']); ?></td>
                  <td>$<?= number_format($row['Price'], 2); ?></td>
              </tr>
          <?php else: ?>
              <tr>
                  <td colspan="4">No cars available for this manufacturer.</td>
              </tr>
          <?php endif;
      endwhile;
  else:
      echo "<p>No manufacturers or cars found.</p>";
  endif;
  ?>
  </tbody></table>
</div>
