<h1>Car Models</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Year</th>
     </tr>
   </thead>
   <tbody>
    <?php
    // Check if $car_models is valid before trying to fetch results
    if ($carmodels) {
        while ($carmodel = $carmodels->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo htmlspecialchars($carmodel['model_id']); ?></td>
      <td><?php echo htmlspecialchars($carmodel['model_name']); ?></td>
      <td><?php echo htmlspecialchars($carmodel['model_year']); ?></td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='3'>No car models found.</td></tr>";
    }
    ?>
   </tbody>
  </table>
</div>

<div id="addEditPopup" class="popup" style="display:none;">
    <form action="add_edit_model.php" method="POST">
        <h2>Add/Edit Car Model</h2>
        <label for="model">Model Name:</label>
        <input type="text" name="model_name" value="" required><br>

        <label for="year">Year:</label>
        <input type="number" name="model_year" value="" required><br>

        <label for="make">Car Make:</label>
        <select name="make_id" required>
            <?php
            // Check if $car_makes is valid before populating the dropdown
            if ($car_makes) {
                while ($car_make = $car_makes->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($car_make['make_id']) . "'>" . htmlspecialchars($car_make['make_name']) . "</option>";
                }
            } else {
                echo "<option value=''>No car makes available</option>";
            }
            ?>
        </select><br>

        <button type="submit">Submit</button>
    </form>
</div>

<div id="notification" class="notification" style="display:none;">
    <p>Car Model operation was successful!</p>
</div>
