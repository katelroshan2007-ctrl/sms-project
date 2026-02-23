<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$student_id = $_SESSION['student_id'];

$result=mysqli_query($conn,"
SELECT * FROM results 
WHERE student_id='$student_id'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Results</title>
</head>
<body>

<h2>My Results</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Marks</th>
    <th>Grade</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['marks']; ?></td>
    <td><?php echo $row['grade']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
