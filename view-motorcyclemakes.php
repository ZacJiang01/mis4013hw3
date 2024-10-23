<h1>Motorcycle Makes</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Country</th>
     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $motorcycle_makes contains valid results
    if ($motorcycle_makes && $motorcycle_makes->num_rows > 0) {
        while ($make_row = $motorcycle_makes->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($make_row['make_id']); ?></td>
      <td><?php echo htmlspecialchars($make_row['make_name']); ?></td>
      <td><?php echo htmlspecialchars($make_row['make_country']); ?></td>
    </tr>
    <?php
        }
    } else {
        // Handle case when no motorcycle makes are found
        echo "<tr><td colspan='3'>No motorcycle makes found.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>
