<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
        /* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

/* Table styling */
table {
    width: 100%;
    height: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #dee2e6;
}

th, td {
    padding: 12;
    text-align: center;
}

th {
    background-color: #343a40;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e9ecef;
}

/* Button styling */
.btn {
    text-decoration: none;
    padding: 8px 12px;
    color: #fff;
    border-radius: 4px;
    display: inline-block;
    margin: 4px 2px;
    font-size: 14px;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>
    <?php
    include ('../include/admin_nav.html');
require_once '../constant/config.php';
    try {
        $stmt = $conn->prepare("SELECT ID,First_Name,Middle_Name,Last_Name,Gender,Age,Birthdate,Email,Username,Password FROM users");
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Gender</th><th>Age</th><th>Birthdate</th><th>Email</th><th>Username</th><th>Password</th><th>Action</th></tr>";
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                echo "<tr>
                        <td>".$row["ID"]."</td>
                        <td>".$row["First_Name"]."</td>
                        <td>".$row["Middle_Name"]."</td>
                        <td>".$row["Last_Name"]."</td>
                        <td>".$row["Gender"]."</td>
                        <td>".$row["Age"]."</td>
                        <td>".$row["Birthdate"]."</td>
                        <td>".$row["Email"]."</td>
                        <td>".$row["Username"]."</td>
                        <td>".$row["Password"]."</td>
                        <td>
                            <a class='btn btn-info' href='update_user.php?id=". $row['ID'] ."'>Edit</a>&nbsp;
                            <a class='btn btn-danger' href='delete.php?id=". $row['ID'] ."'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>
