<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'db_connection.php'; // Include the database connection script

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the employee record
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="popup" id="popupForm">
            <div class="popup-content">
                <span class="close" onclick="closeForm()">&times;</span>
                <h2>Update Employee</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
                    Address: <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
                    Salary: <input type="text" name="salary" value="<?php echo $row['salary']; ?>" required><br>
                    <input type="submit" name="update" value="Update Employee">
                </form>
            </div>
        </div>
        
        <script>
            function openForm() {
                document.getElementById("popupForm").style.display = "block";
            }
            
            function closeForm() {
                document.getElementById("popupForm").style.display = "none";
            }
            
            // Automatically open the form when the page loads
            openForm();
        </script>
<?php
    } else {
        echo "No employee found with the given ID.";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    // Update the employee record
    $sql = "UPDATE employees SET name='$name', address='$address', salary='$salary' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    header("Location: index.php"); // Redirect to the index page after updating
    exit(); // Ensure no further code is executed after redirection
}

$conn->close();
?>
</body>
</html>
