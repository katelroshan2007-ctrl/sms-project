<?php
include("../includes/db.php");
include("../includes/auth_check.php");

if(isset($_POST['mark'])){
    $student_id = $_POST['student_id'];
    $status = $_POST['status'];
    $date = date("Y-m-d");

    mysqli_query($conn,"INSERT INTO attendance(student_id,date,status)
    VALUES('$student_id','$date','$status')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
</head>
<body>

<h2>Mark Attendance</h2>

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

    Status:
    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select>

    <button type="submit" name="mark">Submit</button>
</form>

<hr>

<h3>Attendance Records</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM attendance ORDER BY id DESC");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
