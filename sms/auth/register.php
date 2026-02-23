<?php
include("../config/db.php");

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    mysqli_query($conn,
        "INSERT INTO users(username,password,role)
         VALUES('$username','$password','$role')"
    );

    $success = "User Registered Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
</head>
<body>

<h2>Register</h2>

<?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

<form method="POST">

Username:
<input type="text" name="username" required><br><br>

Password:
<input type="password" name="password" required><br><br>

Role:
<select name="role" required>
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
    <option value="student">Student</option>
    <option value="parent">Parent</option>
    <option value="librarian">Librarian</option>
    <option value="accountant">Accountant</option>
</select>

<br><br>

<button type="submit" name="register">Register</button>

</form>

<br>
<a href="login.php">Back to Login</a>

</body>
</html>
