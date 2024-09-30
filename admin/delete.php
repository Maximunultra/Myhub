<?php 
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=animaldb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT ID, file_path, type, breed, lifespan, description FROM images");
    $stmt->execute();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM images WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Record deleted successfully.";
            header("Location: display.php");
        } else {
            echo "No records deleted.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 
?>