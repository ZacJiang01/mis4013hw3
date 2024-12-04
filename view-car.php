<h1>Car Models</h1>
<div class="table-responsive">
  <table class="table">
   <thead>
     <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Color</th>
      <th>Price</th>
     </tr>
   </thead>
   <tbody>
    <?php if ($Car): ?>
        <?php while ($car = $Car->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($car['CarID']); ?></td>
                <td><?= htmlspecialchars($car['CarModel']); ?></td>
                <td><?= htmlspecialchars($car['Color']); ?></td>
                <td><?= htmlspecialchars($car['Price']); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No cars found.</td>
        </tr>
    <?php endif; ?>
   </tbody>
  </table>
</div>
