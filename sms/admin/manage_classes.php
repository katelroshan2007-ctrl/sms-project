<?php
include("../config/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
$class=$_POST['class_name'];
$section=$_POST['section'];

$conn->query("INSERT INTO classes(class_name,section) 
VALUES('$class','$section')");
}

$result=$conn->query("SELECT * FROM classes");
?>

<h2>Manage Classes</h2>

<form method="post">
<input name="class_name" placeholder="Class Name" required>
<input name="section" placeholder="Section" required>
<button name="add">Add Class</button>
</form>

<table border="1">
<tr><th>ID</th><th>Class</th><th>Section</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['class_id']; ?></td>
<td><?php echo $row['class_name']; ?></td>
<td><?php echo $row['section']; ?></td>
</tr>
<?php } ?>
</table>
