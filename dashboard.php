<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Your dashboard code here
echo "<h1>Welcome to the Admin Dashboard, " . $_SESSION['admin'] . "!</h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <a href="add_student.php">Add Student</a>
        <a href="delete_student.php">Delete Student</a>
        <a href="edit_student.php">Edit Student</a>
        <a href="view_student.php">View Students</a>
        <a href="../auth/logout.php">Logout</a>
    </nav>
</body>
</html>
