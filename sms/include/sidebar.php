<?php
if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<div class="d-flex">

<!-- Sidebar -->
<div id="sidebar" class="bg-dark text-white p-3" style="width:240px; min-height:100vh;">
    <h5 class="text-center">Menu</h5>
    <hr>

    <?php if($_SESSION['role']=="admin"){ ?>
        <a href="../admin/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../admin/manage_students.php" class="text-white d-block mb-2">Students</a>
        <a href="../admin/manage_teachers.php" class="text-white d-block mb-2">Teachers</a>
        <a href="../admin/manage_classes.php" class="text-white d-block mb-2">Classes</a>
        <a href="../admin/attendance.php" class="text-white d-block mb-2">Attendance</a>
        <a href="../admin/results.php" class="text-white d-block mb-2">Results</a>
        <a href="../admin/reports.php" class="text-white d-block mb-2">Reports</a>
        <a href="../admin/users.php" class="text-white d-block mb-2">Users</a>
    <?php } ?>

    <?php if($_SESSION['role']=="teacher"){ ?>
        <a href="../teacher/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../teacher/attendance.php" class="text-white d-block mb-2">Attendance</a>
        <a href="../teacher/results.php" class="text-white d-block mb-2">Results</a>
    <?php } ?>

    <?php if($_SESSION['role']=="student"){ ?>
        <a href="../student/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../student/attendance.php" class="text-white d-block mb-2">Attendance</a>
        <a href="../student/results.php" class="text-white d-block mb-2">Results</a>
    <?php } ?>

    <?php if($_SESSION['role']=="parent"){ ?>
        <a href="../parent/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../parent/attendance.php" class="text-white d-block mb-2">Attendance</a>
        <a href="../parent/results.php" class="text-white d-block mb-2">Results</a>
    <?php } ?>

    <?php if($_SESSION['role']=="librarian"){ ?>
        <a href="../librarian/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../librarian/books.php" class="text-white d-block mb-2">Books</a>
        <a href="../librarian/issue_books.php" class="text-white d-block mb-2">Issue Books</a>
        <a href="../librarian/return_books.php" class="text-white d-block mb-2">Return Books</a>
    <?php } ?>

    <?php if($_SESSION['role']=="accountant"){ ?>
        <a href="../accountant/dashboard.php" class="text-white d-block mb-2">Dashboard</a>
        <a href="../accountant/fees.php" class="text-white d-block mb-2">Fees</a>
        <a href="../accountant/payments.php" class="text-white d-block mb-2">Payments</a>
        <a href="../accountant/reports.php" class="text-white d-block mb-2">Reports</a>
    <?php } ?>

    <hr>
    <a href="../auth/logout.php" class="btn btn-danger btn-sm w-100">Logout</a>
</div>

<!-- Page Content -->
<div class="flex-grow-1 p-4">
