<?php
include("../includes/db.php");

if(isset($_POST['add'])){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $qty=$_POST['quantity'];

    mysqli_query($conn,"INSERT INTO books(title,author,quantity)
    VALUES('$title','$author','$qty')");
}
?>

<h2>Manage Books</h2>

<form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    <button type="submit" name="add">Add Book</button>
</form>

<hr>

<h3>Book List</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Quantity</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM books");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
</tr>
<?php } ?>
</table>
