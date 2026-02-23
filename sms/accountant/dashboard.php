<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$students = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM students"));
$fees = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM fees"));
$payments = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM payments"));
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Accountant Dashboard</title>
</head>
<body>

<h2>Accountant Dashboard</h2>

<div>
    <h3>Total Students: <?php echo $students['total']; ?></h3>
</div>

<div>
    <h3>Total Fee Records: <?php echo $fees['total']; ?></h3>
</div>

<div>
    <h3>Total Payments: <?php echo $payments['total']; ?></h3>
</div>

<br>

<a href="fees.php">Manage Fees</a> |
<a href="payments.php">Record Payments</a> |
<a href="reports.php">View Reports</a>

</body>
</html>
