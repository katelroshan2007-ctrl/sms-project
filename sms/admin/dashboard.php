<?php
include("../config/db.php");
include("../includes/auth_check.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$students = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
$teachers = $conn->query("SELECT COUNT(*) as total FROM teachers")->fetch_assoc()['total'];
$classes  = $conn->query("SELECT COUNT(*) as total FROM classes")->fetch_assoc()['total'];
?>

<h2 class="page-title">Admin Dashboard</h2>

<div class="dashboard-row">
    <div class="dashboard-card primary">
        <h3>Total Students</h3>
        <p><?php echo $students; ?></p>
    </div>

    <div class="dashboard-card success">
        <h3>Total Teachers</h3>
        <p><?php echo $teachers; ?></p>
    </div>

    <div class="dashboard-card warning">
        <h3>Total Classes</h3>
        <p><?php echo $classes; ?></p>
    </div>
</div>

<?php include("../includes/footer.php"); ?>
