<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$parent_id = $_SESSION['parent_id'];

// Get parent info
$parent = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM parents WHERE parent_id='$parent_id'"
));

$student_id = $parent['student_id'];

// Get student info
$student = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM students WHERE student_id='$student_id'"
));

// Attendance summary
$attendance = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total_present 
 FROM attendance 
 WHERE student_id='$student_id' AND status='Present'"
));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Parent Dashboard</title>
</head>
<body>

<h2>Parent Dashboard</h2>

<p><strong>Parent:</strong> <?php echo $parent['name']; ?></p>
<p><strong>Student:</strong> <?php echo $student['name']; ?></p>

<h3>Total Present Days: <?php echo $attendance['total_present']; ?></h3>

<br>

<a href="attendance.php">View Attendance</a> |
<a href="results.php">View Results</a>

</body>
</html>
