<?php
include("../includes/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
    $student_id = $_POST['student_id'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];

    mysqli_query($conn,"INSERT INTO results(student_id,marks,grade)
    VALUES('$student_id','$marks','$grade')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Results</title>
</head>
<body>

<h2>Enter Student Results</h2>

<form method="POST">
    Student:
    <select name="student_id">
        <?php
        $students=mysqli_query($conn,"SELECT * FROM students");
        while($row=mysqli_fetch_assoc($students)){
            echo "<option value='{$row['student_id']}'>{$row['name']}</option>";
        }
        ?>
    </select>

    Marks:
    <input type="number" name="marks" required>

    Grade:
    <input type="text" name="grade" required>

    <button type="submit" name="add">Add Result</button>
</form>

<hr>

<h3>Result Records</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Marks</th>
    <th>Grade</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM results ORDER BY id DESC");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['marks']; ?></td>
    <td><?php echo $row['grade']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
