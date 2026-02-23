<?php
include("../config/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
$name=$_POST['name'];
$email=$_POST['email'];
$class_id=$_POST['class_id'];

$conn->query("INSERT INTO students(name,email,class_id) 
VALUES('$name','$email','$class_id')");
}

$result=$conn->query("SELECT * FROM students");
?>

<h2>Manage Students</h2>

<form method="post">
<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>
<input name="class_id" placeholder="Class ID" required>
<button name="add">Add Student</button>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['student_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
</tr>
<?php } ?>
</table>
