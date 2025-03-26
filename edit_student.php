<?php
include('../includes/db.php'); 


if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id']; // Get the student ID from the form
    $name = $_POST['name']; // Get the new student name
    $age = $_POST['age']; // Get the new student age

    // Update the student details in the database
    $query = "UPDATE students SET name = '$name', age = $age WHERE student_id = $student_id";
    if ($conn->query($query) === TRUE) {
        echo "Student with ID $student_id updated successfully!";
    } else {
        echo "Error: " . $conn->error; // Display any SQL error
    }
}

// Optional: Pre-fill form if a student ID is passed in the URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = $student_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $student_name = $student['name'];
        $student_age = $student['age'];
    } else {
        echo "No student found with ID $student_id.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Link the CSS file -->
    <title>Edit Student</title>
</head>
<body>
    <header>
        <h1>Edit Student</h1>
    </header>
    <main>
        <form action="edit_student.php" method="POST">
            <label for="student_id">Student ID:</label>
            <input type="number" id="student_id" name="student_id" required 
                   value="<?php echo isset($student_id) ? $student_id : ''; ?>">

            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required 
                   value="<?php echo isset($student_name) ? $student_name : ''; ?>">

            <label for="age">Student Age:</label>
            <input type="number" id="age" name="age" required 
                   value="<?php echo isset($student_age) ? $student_age : ''; ?>">

            <button type="submit" name="submit">Update Student</button>
        </form>
    </main>
</body>
</html>
