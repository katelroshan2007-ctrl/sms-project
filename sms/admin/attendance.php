<?php
include("../config/db.php");
include("../includes/auth_check.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$message = "";

// Insert Attendance
if(isset($_POST['mark'])){

    $student_id = $_POST['student_id'];
    $status     = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, CURDATE(), ?)");
    $stmt->bind_param("is", $student_id, $status);

    if($stmt->execute()){
        $message = "Attendance marked successfully!";
    } else {
        $message = "Error marking attendance.";
    }
}

$students = $conn->query("SELECT * FROM students");
?>

<h2 class="page-title">Mark Attendance</h2>

<?php if($message != ""): ?>
    <div class="success-message"><?php echo $message; ?></div>
<?php endif; ?>

<div class="form-container">
    <form method="post">

        <label>Select Student</label>
        <select name="student_id" required>
            <option value="">-- Select Student --</option>
            <?php while($row = $students->fetch_assoc()){ ?>
                <option value="<?php echo $row['student_id']; ?>">
                    <?php echo $row['name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Status</label>
        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>

        <button type="submit" name="mark">Submit</button>

    </form>
</div>

<?php include("../includes/footer.php"); ?>
