<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    if(mysqli_num_rows($query) == 1){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = $row['role'];

        // Redirect according to role
        switch($row['role']){

            case "admin":
                header("Location: ../admin/dashboard.php");
                break;

            case "teacher":
                header("Location: ../teacher/dashboard.php");
                break;

            case "student":
                header("Location: ../student/dashboard.php");
                break;

            case "parent":
                header("Location: ../parent/dashboard.php");
                break;

            case "librarian":
                header("Location: ../librarian/dashboard.php");
                break;

            case "accountant":
                header("Location: ../accountant/dashboard.php");
                break;
        }

        exit();

    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <br>
    <a href="register.php">Create Account</a>
</div>

</body>
</html>
