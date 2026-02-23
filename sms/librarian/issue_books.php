<?php
include("../includes/db.php");

if(isset($_POST['issue'])){
    $student_id=$_POST['student_id'];
    $book_id=$_POST['book_id'];
    $date=date("Y-m-d");

    mysqli_query($conn,"INSERT INTO issued_books(student_id,book_id,issue_date)
    VALUES('$student_id','$book_id','$date')");
}
?>

<h2>Issue Book</h2>

<form method="POST">
    Student ID: <input type="number" name="student_id" required><br><br>

    Book:
    <select name="book_id">
        <?php
        $books=mysqli_query($conn,"SELECT * FROM books");
        while($b=mysqli_fetch_assoc($books)){
            echo "<option value='{$b['id']}'>{$b['title']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="issue">Issue Book</button>
</form>
