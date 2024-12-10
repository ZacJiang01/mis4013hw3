<h1>Colors</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>

      <th>Color</th>

     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $Cars is a valid result set before fetching rows
    if ($Cars && $Cars->num_rows > 0) {
        while ($car_row = $Cars->fetch_assoc()) {
    ?>
    <tr>

      <td><?php echo htmlspecialchars($car_row['Color']); ?></td>

      <td>
        <form method = "post" action ="cars-by-colors.php">
          <input type = "hidden" name = "cid" value ="<?php echo htmlspecialchars($car_row['Color']); ?>">
          <button type="submit" class="btn btn-primary">Colors</button>
        </form>
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
