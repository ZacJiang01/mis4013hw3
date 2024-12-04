<h1>Manufacturers and Their Cars</h1>
<div class="table-responsive">
  <?php
  if ($CombinedData && $CombinedData->num_rows > 0):
      while ($row = $CombinedData->fetch_assoc()):
          echo "<pre>" . print_r($row, true) . "</pre>"; // Debugging output
      endwhile;
  else:
      echo "<p>No manufacturers or cars found.</p>";
  endif;
  ?>
</div>
