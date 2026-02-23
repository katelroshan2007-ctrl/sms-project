<?php
include("../config/db.php");
include("../includes/auth_check.php");

$students = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
$attendance = $conn->query("SELECT COUNT(*) as total FROM attendance")->fetch_assoc()['total'];
$results = $conn->query("SELECT COUNT(*) as total FROM results")->fetch_assoc()['total'];
?>

<h2>Reports</h2>

<p>Total Students: <?php echo $students; ?></p>
<p>Total Attendance Records: <?php echo $attendance; ?></p>
<p>Total Results: <?php echo $results; ?></p>
