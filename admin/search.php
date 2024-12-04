<?php
require_once '../constant/config.php';

$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $query = "SELECT ID, file_path, type, breed, lifespan, description, status 
              FROM images 
              WHERE status = 'enabled'";

    if (!empty($searchTerm)) {
        $query .= " AND (breed LIKE :search OR type LIKE :search)";
    }

    $stmt = $conn->prepare($query);

    if (!empty($searchTerm)) {
        $stmt->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Include the HTML template and pass the data
    include 'search.html';
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
