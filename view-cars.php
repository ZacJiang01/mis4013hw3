<div class = "row">
  <div class = "col">
    <h1>Cars</h1>
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
      <th>Model</th>
      <th>Color</th>
      <th>Price</th>
       <th></th>
        <th></th>
          <th></th>
     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $Cars is a valid result set before fetching rows
    if ($Cars && $Cars->num_rows > 0) {
        while ($car_row = $Cars->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($car_row['CarID']); ?></td>
      <td><?php echo htmlspecialchars($car_row['CarModel']); ?></td>
      <td><?php echo htmlspecialchars($car_row['Color']); ?></td>
      <td>$<?php echo number_format($car_row['Price'], 2); ?></td>

  
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
        echo "<tr><td colspan='5'>No cars found or query failed.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>
