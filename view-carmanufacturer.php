<div class = "row">
  <div class = "col">
    <h1>Manufacturer</h1>
  </div>
  <div class = "col-auto">
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newManufacturerModal">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="newManufacturerModal" tabindex="-1" aria-labelledby="newManufacturerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newManufacturerModalLabel">New Manufacturer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="ManufacturerName" class="form-label">Manufacturer Name</label>
            <input type="text" class="form-control" id="ManufacturerName" name="ManufacturerName" required>
          </div>
          <input type="hidden" name="actionType" value="AddManufacturer">
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

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
         <td>
          <form method = "post" action ="">
          <input type = "hidden" name = "CarID" value ="<?php echo htmlspecialchars($car_row['CarID']); ?>">
            <input type ="hidden" name="actionType" value ="Delete">
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
        </svg>
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
