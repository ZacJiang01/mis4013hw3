<h1>Motorcycle Models</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Year</th>
      <th>Make</th>
     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $motorcycle_models contains valid results
    if ($motorcycle_models && $motorcycle_models->num_rows > 0) {
        while ($model_row = $motorcycle_models->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($model_row['model_id']); ?></td>
      <td><?php echo htmlspecialchars($model_row['model_name']); ?></td>
      <td><?php echo htmlspecialchars($model_row['model_year']); ?></td>
      <td><?php echo htmlspecialchars($model_row['make_name']); ?></td>  <!-- Assuming make_name is fetched via JOIN -->
    </tr>
    <?php
        }
    } else {
        // Handle case when no motorcycle models are found
        echo "<tr><td colspan='4'>No motorcycle models found.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>
