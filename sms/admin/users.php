<?php
include("../config/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$conn->query("INSERT INTO users(username,password,role) 
VALUES('$username','$password','$role')");
}

$result=$conn->query("SELECT * FROM users");
?>

<h2>Users</h2>

<form method="post">
<input name="username" placeholder="Username" required>
<input name="password" placeholder="Password" required>

<select name="role">
<option>admin</option>
<option>teacher</option>
<option>student</option>
<option>parent</option>
<option>librarian</option>
<option>accountant</option>
</select>

<button name="add">Add User</button>
</form>

<table border="1">
<tr><th>ID</th><th>Username</th><th>Role</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['role']; ?></td>
</tr>
<?php } ?>
</table>
