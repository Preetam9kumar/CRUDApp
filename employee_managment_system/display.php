<?php
include 'db_connection.php'; // Include the database connection script

$sql = "SELECT id, name, address, salary FROM employees"; // Updated SQL query to include salary
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='5' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='100px'>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salary</th>
                <th width='100px'>Edit</th>
                <th width='100px'>Delete</th>
            </tr>";
    
    // Output data of each row
    $sno = 0;
    while($row = $result->fetch_assoc()) {
        $sno++;
        echo "<tr>
                <td>{$sno}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['salary']}</td>
                <td><a href='edite.php?id={$row['id']}'>Edit</a></td>
                <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
