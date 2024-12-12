<?php
include 'constant/config.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the query
        $query = "SELECT * FROM users WHERE Username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password == $row['Password']) {
                // Successful login, check user role
                $role = $row['Role'];
                $_SESSION['ID'] = $row['ID'];

                if ($role == 'admin') {
                    $_SESSION['admin'] = $row['Username'];
                    header("Location: ./admin/users.php");
                    exit();
                } elseif ($role == 'user') {
                    $_SESSION['user'] = $row['Username'];
                    header("Location: ./admin/breeds.php");
                    exit();
                }
            } else {
                echo "<script>alert('Invalid username or password.');
                document.getElementById('loginForm').reset();
                </script>";
                
            }
        } else {
            echo "<script>alert('Invalid username or password.');
                        document.getElementById('loginForm').reset();
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
