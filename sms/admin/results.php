<?php
include("../config/db.php");
include("../includes/auth_check.php");

if(isset($_POST['add'])){
$student_id=$_POST['student_id'];
$marks=$_POST['marks'];
$grade=$_POST['grade'];

$conn->query("INSERT INTO results(student_id,marks,grade) 
VALUES('$student_id','$marks','$grade')");
}

$students=$conn->query("SELECT * FROM students");
?>

<h2>Results</h2>

<form method="post">
<select name="student_id">
<?php while($row=$students->fetch_assoc()){ ?>
<option value="<?php echo $row['student_id']; ?>">
<?php echo $row['name']; ?>
</option>
<?php } ?>
</select>

<input name="marks" placeholder="Marks" required>
<input name="grade" placeholder="Grade" required>
<button name="add">Add Result</button>
</form>
