<?php
require_once("util-db.php");

$pageTitle = "Car Colors";

// Query to get distinct car colors in alphabetical order
$conn = get_db_connection();
$query = "SELECT DISTINCT Color FROM Car ORDER BY Color ASC";
$result = $conn->query($query);

include "view-header.php";
?>
<h1>Car Colors</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Color</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['Color']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td>No colors found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
$conn->close();
include "view-footer.php";
?>
