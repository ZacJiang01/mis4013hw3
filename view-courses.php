<h1>Car Makes</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
    <th>ID</th>
     <th>Name</th>
     <th>Number</th>
     </tr>
</thead>
    <tbody>
      <?php
while ($car_make = $car_make->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $car_make['make_id']; ?></td>
     <td><?php echo $car_make['make_name']; ?></td>
     <td><?php echo $car_make['make_country']; ?></td>
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
        <label for="make">Make:</label>
        <input type="text" name="make_name" value="" required><br>
        <label for="country">Country:</label>
        <input type="text" name="make_country" value="" required><br>
        <label for="model">Model:</label>
        <input type="text" name="model_name" value="" required><br>
        <label for="year">Year:</label>
        <input type="number" name="model_year" value="" required><br>
        <button type="submit">Submit</button>
    </form>
</div>

<div id="notification" class="notification" style="display:none;">
    <p>Car Make operation was successful!</p>
</div>
