<?php
include("../includes/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    mysqli_query($conn,"INSERT INTO fees(student_id,amount,description)
    VALUES('$student_id','$amount','$description')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Manage Fees</title>
</head>
<body>

<h2>Add Student Fee</h2>

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

    Amount:
    <input type="number" name="amount" required>

    Description:
    <input type="text" name="description" required>

    <button type="submit" name="add">Add Fee</button>
</form>

<hr>

<h3>Fee Records</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Amount</th>
    <th>Description</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM fees ORDER BY id DESC");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['description']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
