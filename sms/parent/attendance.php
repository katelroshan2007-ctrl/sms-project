<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$parent_id = $_SESSION['parent_id'];

$parent = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM parents WHERE parent_id='$parent_id'"
));

$student_id = $parent['student_id'];

$result = mysqli_query($conn,
"SELECT * FROM attendance 
 WHERE student_id='$student_id'
 ORDER BY date DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
</head>
<body>

<h2>Attendance Record</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>
