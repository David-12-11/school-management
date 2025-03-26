<?php
include('../includes/db.php'); // Include the database connection

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id']; // Get the student ID from the form

    // SQL query to delete the student with the entered ID
    $query = "DELETE FROM students WHERE student_id = $student_id";
    if ($conn->query($query) === TRUE) {
        echo "Student with ID $student_id deleted successfully!";
    } else {
        echo "Error: " . $conn->error; // Display an error if the query fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Link to your CSS -->
    <title>Delete Student</title>
</head>
<body>
    <header>
        <h1>Delete Student</h1>
    </header>
    <main>
        <form action="delete_student.php" method="POST">
            <label for="student_id">Student ID:</label>
            <input type="number" id="student_id" name="student_id" required> <!-- Accepts integer input only -->

            <button type="submit" name="submit">Delete Student</button>
        </form>
    </main>
</body>
</html>
