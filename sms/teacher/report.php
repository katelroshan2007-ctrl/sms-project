<?php
include("../includes/db.php");
include("../includes/auth_check.php");

$total_fees = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) as total FROM fees"));
$total_payments = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) as total FROM payments"));

$balance = $total_fees['total'] - $total_payments['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports</title>
</head>
<body>

<h2>Financial Report</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Total Fees</th>
    <th>Total Payments</th>
    <th>Balance</th>
</tr>

<tr>
    <td><?php echo $total_fees['total']; ?></td>
    <td><?php echo $total_payments['total']; ?></td>
    <td><?php echo $balance; ?></td>
</tr>

</table>

</body>
</html>
