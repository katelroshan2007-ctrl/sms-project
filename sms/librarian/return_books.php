<?php
include("../includes/db.php");

if(isset($_GET['return'])){
    $id=$_GET['return'];
    $date=date("Y-m-d");

    mysqli_query($conn,"UPDATE issued_books 
    SET status='Returned', return_date='$date' 
    WHERE id='$id'");
}
?>

<h2>Return Books</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student ID</th>
    <th>Book ID</th>
    <th>Issue Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM issued_books WHERE status='Issued'");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['book_id']; ?></td>
    <td><?php echo $row['issue_date']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
        <a href="?return=<?php echo $row['id']; ?>">Return</a>
    </td>
</tr>
<?php } ?>
</table>
