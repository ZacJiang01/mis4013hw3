<h1>Car Models</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
    <th>ID</th>
     <th>Name</th>
     <th>Office</th>
     </tr>
</thead>
    <tbody>
      <?php
while ($instructor = $instructors->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $instructor['model_id']; ?></td>
     <td><?php echo $instructor['model_name']; ?></td>
     <td><?php echo $instructor['model_year']; ?></td>
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
    <p>Car Model operation was successful!</p>
</div>
