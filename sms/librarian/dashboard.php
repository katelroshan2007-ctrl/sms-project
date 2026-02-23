<?php
include("../includes/db.php");

$books = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM books"));
$issued = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM issued_books WHERE status='Issued'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Librarian Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Librarian Dashboard</h2>

<div class="card">
    <h3>Total Books: <?php echo $books['total']; ?></h3>
</div>

<div class="card">
    <h3>Issued Books: <?php echo $issued['total']; ?></h3>
</div>

<a href="books.php">Manage Books</a> |
<a href="issue_books.php">Issue Books</a> |
<a href="return_books.php">Return Books</a>

</body>
</html>
