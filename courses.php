<?php 
require_once("util-db.php");
require_once("model-courses.php");

$pageTitle = "Courses";
include "view-header.php";
$instructors = selectCourses();

include "view-instructors.php";
include "view-footer.php";
?>
