<h1>Car Makes</h1>
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
    // Check if $car_makes contains valid results
    if ($car_makes) {
        while ($carmake_row = $car_makes->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($carmake_row['make_id']); ?></td>
      <td><?php echo htmlspecialchars($carmake_row['make_name']); ?></td>
      <td><?php echo htmlspecialchars($carmake_row['make_country']); ?></td>
    </tr>
    <?php
        }
    } else {
        // Handle the case when no car makes are found or the query failed
        echo "<tr><td colspan='3'>No car makes found.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>

<div id="addEditPopup" class="popup" style="display:none;">
    <form action="add_edit_car.php" method="POST">
        <h2>Add/Edit Car Make</h2>
        <label for="make">Make Name:</label>
        <input type="text" name="make_name" value="" required><br>
        <label for="country">Country:</label>
        <input type="text" name="make_country" value="" required><br>
        <button type="submit">Submit</button>
    </form>
</div>

<div id="notification" class="notification" style="display:none;">
    <p>Car Make operation was successful!</p>
</div>
