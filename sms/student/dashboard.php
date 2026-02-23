<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$student_id = $_SESSION['student_id'];

$student = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM students WHERE student_id='$student_id'"));

$attendance = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) as total FROM attendance 
WHERE student_id='$student_id' AND status='Present'
"));

$results = mysqli_query($conn,"SELECT * FROM results WHERE student_id='$student_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $student['name']; ?></h2>

<div>
    <h3>Total Present Days: <?php echo $attendance['total']; ?></h3>
</div>

<br>

<a href="attendance.php">View Attendance</a> |
<a href="results.php">View Results</a>

<hr>

<h3>Your Results Overview</h3>

<table border="1" cellpadding="10">
<tr>
    <th>Marks</th>
    <th>Grade</th>
</tr>

<?php while($row=mysqli_fetch_assoc($results)){ ?>
<tr>
    <td><?php echo $row['marks']; ?></td>
    <td><?php echo $row['grade']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
