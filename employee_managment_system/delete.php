<?php
include 'db_connection.php'; // Include the database connection script

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Simple query to delete the record
    $sql = "DELETE FROM employees WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
