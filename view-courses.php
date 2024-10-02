<h1>Instructors</h1>
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
while ($course = $courses->fetch_assoc()) {
  ?>
  <tr>
    <td><?php echo $instructor['course_id']; ?></td>
     <td><?php echo $instructor['course_name']; ?></td>
     <td><?php echo $instructor['course_number']; ?></td>
  </tr>
  <?php
}
?>
    </tbody>
  </table>
</div>
