<?php
include('../includes/db.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert into database
    $query = "INSERT INTO admins (username, password_hash) VALUES ('$username', '$password')";
    if ($conn->query($query) === TRUE) {
        // Redirect to login form with credentials pre-filled
        header("Location: ../auth/login.php?username=$username");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Register Admin</title>
</head>
<body>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
