<!DOCTYPE html>
<html>

<head>
    <title>Employee Information</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .header{
            display: flex;
            justify-content: space-evenly;
            background-color:burlywood;
            box-shadow:gray 5px 5px 5px;
            margin-bottom: 20px;
        }
        body{
            margin: 0;
        }
        .header .btn{
            height: 40px;
            margin-top: 20px;
            border-radius: 15px;
            border-color: white;
            background-color: rgb(233, 134, 5);
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Employee Management System</h1>
        <button onclick="openForm()" class="btn">Add New Employee</button>
    </div>
    <?php
    include 'db_connection.php'; // Include the database connection script

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        // Insert new employee record
        $sql = "INSERT INTO employees (`name`, `address`, `salary`) VALUES ('{$name}', '{$address}', '{$salary}')";

        if ($conn->query($sql) === TRUE) {
            echo "New employee added successfully";
            header("Location: index.php"); // Redirect to the index page after adding
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
    include 'display.php'
    ?>

    <!-- The Popup -->
    <div class="popup" id="popupForm">
        <div class="popup-content">
            <span class="close" onclick="closeForm()">&times;</span>
            <h2>Add New Employee</h2>
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                Name: <input type="text" name="name" required><br>
                Address: <input type="text" name="address" required><br>
                Salary: <input type="text" name="salary" required><br>
                <input type="submit" name="add" value="Add Employee">
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
    </script>

</body>

</html>