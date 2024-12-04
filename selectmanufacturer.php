<?php
require_once("util-db.php");

$pageTitle = "Manufacturers";

// Fetch manufacturers
$conn = get_db_connection();
$query = "SELECT ManufacturerID, ManufacturerName FROM Manufacturer";
$result = $conn->query($query);

include "view-header.php";
?>
<h1>Manufacturers</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['ManufacturerID']); ?></td>
            <td><?= htmlspecialchars($row['ManufacturerName']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="2">No manufacturers found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
