<?php
include('../includes/db.php');

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    // Insert student into the database
    $query = "INSERT INTO students (student_id, name, age, email) VALUES ('$student_id', '$name', $age, '$email')";
    if ($conn->query($query) === TRUE) {
        echo "Student added successfully! Their ID is: " . $student_id;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Add Student</title>
</head>
<body>
    <form action="add_student.php" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>

        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Student Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="email">Student Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit" name="submit">Add Student</button>
    </form>
</body>
</html>
