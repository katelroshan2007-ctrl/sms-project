<?php
include("../includes/db.php");
include("../includes/auth_check.php");

if(isset($_POST['pay'])){
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $date = date("Y-m-d");

    mysqli_query($conn,"INSERT INTO payments(student_id,amount,date)
    VALUES('$student_id','$amount','$date')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Record Payment</title>
</head>
<body>

<h2>Record Payment</h2>

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

    <button type="submit" name="pay">Submit Payment</button>
</form>

<hr>

<h3>Payment Records</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Amount</th>
    <th>Date</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM payments ORDER BY id DESC");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['date']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
