<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$parent_id = $_SESSION['parent_id'];

$parent = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM parents WHERE parent_id='$parent_id'"
));

$student_id = $parent['student_id'];

$result = mysqli_query($conn,
"SELECT * FROM results 
 WHERE student_id='$student_id'"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Results</title>
</head>
<body>

<h2>Student Results</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Exam ID</th>
    <th>Marks</th>
    <th>Grade</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['exam_id']; ?></td>
    <td><?php echo $row['marks']; ?></td>
    <td><?php echo $row['grade']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>
