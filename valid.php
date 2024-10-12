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
            // Verify the password
            // echo $password;
            // echo $row;
            if ($password == $row['Password']) {
                // Successful login
                echo $_SESSION['username'] = $username;
                header('Location:./admin/breeds.php');
                exit;
            } else {
                // Invalid password
                echo 'Invalid username or password.';
            }
        } else {
            // Invalid username
            echo 'Invalid username or password.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
