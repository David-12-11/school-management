<?php
include('../includes/db.php');

// Handle search input
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Handle sorting input
$sort = isset($_GET['sort']) ? $conn->real_escape_string($_GET['sort']) : 'student_id';
$order = isset($_GET['order']) ? $conn->real_escape_string($_GET['order']) : 'ASC';
$order = ($order == 'ASC' || $order == 'DESC') ? $order : 'ASC'; // Validate the order

// Query to fetch and filter data
$query = "SELECT * FROM students WHERE student_id LIKE '%$search%' ORDER BY $sort $order";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>View Students</title>
    <style>
        th a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Records</h1>
    </header>
    <main>
        <!-- Search Form -->
        <form method="GET" action="">
            <label for="search">Search by Student ID:</label>
            <input type="text" name="search" id="search" placeholder="Enter Student ID" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Table -->
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th><a href=\"?sort=student_id&order=" . (($sort == 'student_id' && $order == 'ASC') ? 'DESC' : 'ASC') . "&search=$search\">ID</a></th>
                    <th><a href=\"?sort=name&order=" . (($sort == 'name' && $order == 'ASC') ? 'DESC' : 'ASC') . "&search=$search\">Name</a></th>
                    <th><a href=\"?sort=age&order=" . (($sort == 'age' && $order == 'ASC') ? 'DESC' : 'ASC') . "&search=$search\">Age</a></th>
                    <th><a href=\"?sort=email&order=" . (($sort == 'email' && $order == 'ASC') ? 'DESC' : 'ASC') . "&search=$search\">Email</a></th>
                    <th>Created At</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No students found.</p>";
        }
        ?>
    </main>
</body>
</html>
