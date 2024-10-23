<h1>Car Models</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Year</th> <!-- Changed from Office to Year -->
     </tr>
  </thead>
  <tbody>
    <?php
    // Assuming $car_models is the result set from the selectModels function
    while ($car_model = $car_models->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $car_model['model_id']; ?></td>
      <td><?php echo $car_model['model_name']; ?></td>
      <td><?php echo $car_model['model_year']; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  </table>
</div>

<div id="addEditPopup" class="popup" style="display:none;">
    <form action="add_edit_model.php" method="POST">
        <h2>Add/Edit Car Model</h2>
        <!-- Remove unrelated fields for make_name and make_country -->
        <label for="model">Model Name:</label>
        <input type="text" name="model_name" value="" required><br>

        <label for="year">Year:</label>
        <input type="number" name="model_year" value="" required><br>

        <label for="make">Car Make:</label>
        <select name="make_id" required>
            <!-- Options for car makes should be fetched dynamically -->
            <?php
            // Assuming $car_makes is a result set for car makes
            while ($car_make = $car_makes->fetch_assoc()) {
                echo "<option value='{$car_make['make_id']}'>{$car_make['make_name']}</option>";
            }
            ?>
        </select><br>

        <button type="submit">Submit</button>
    </form>
</div>

<div id="notification" class="notification" style="display:none;">
    <p>Car Model operation was successful!</p>
</div>
