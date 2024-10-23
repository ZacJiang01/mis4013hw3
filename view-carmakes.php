<h1>Car Makes</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Country</th> <!-- Changed from Number to Country -->
     </tr>
  </thead>
  <tbody>
    <?php
    // Assuming $car_makes is the result set
    while ($carmake_row = $carmakes->fetch_assoc()) { // Changed variable name to avoid conflict
    ?>
    <tr>
      <td><?php echo $carmake_row['make_id']; ?></td>
      <td><?php echo $carmake_row['make_name']; ?></td>
      <td><?php echo $carmake_row['make_country']; ?></td>
    </tr>
    <?php
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
        <!-- Removed unnecessary fields for car models -->
        <button type="submit">Submit</button>
    </form>
</div>

<div id="notification" class="notification" style="display:none;">
    <p>Car Make operation was successful!</p>
</div>
