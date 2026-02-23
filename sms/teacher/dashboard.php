<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$students = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM students"));
$attendance = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance"));
$results = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM results"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Teacher Dashboard</h2>

<div class="card">
    <h3>Total Students: <?php echo $students['total']; ?></h3>
</div>

<div class="card">
    <h3>Total Attendance Records: <?php echo $attendance['total']; ?></h3>
</div>

<div class="card">
    <h3>Total Results Entered: <?php echo $results['total']; ?></h3>
</div>

<br>

<a href="attendance.php">Mark Attendance</a> |
<a href="results.php">Manage Results</a>

</body>
</html>
