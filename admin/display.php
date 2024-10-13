<?php
include ('../include/admin_nav.html');
require_once '../constant/config.php';

try {
    
    $stmt = $conn->prepare("SELECT ID, file_path, type, breed, lifespan, description FROM images");
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        echo "<div class='card-container'>";
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo "<div class='card'>
                    <img src='" . htmlspecialchars($row['file_path']) . "' alt='Animal Image' class='animal-image'>
                    <div class='card-body'>
                        <h4>Type: " . htmlspecialchars($row["type"]) . "</h4>
                        <p><strong>Breed:</strong> " . htmlspecialchars($row["breed"]) . "</p>
                        <p><strong>Lifespan:</strong> " . htmlspecialchars($row["lifespan"]) . "</p>
                        <p><strong>Description:</strong> " . htmlspecialchars($row["description"]) . "</p>

                        <a class='btn btn-info' href='update.php?id=" . htmlspecialchars($row['ID']) . "'>Edit</a>
                        <a class='btn btn-danger' href='delete.php?id=" . htmlspecialchars($row['ID']) . "'>Delete</a>
                    </div>
                  </div>";
        }

        echo "</div>";  
    } else {
        echo "No results found";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<style>

.card-container {
    display: flex;
    outline: #dc3545 solid 2px;
    width: 90%;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    padding-right: 100px;
    padding-left: 50px;
    margin-left: 200px; 
}

.card {
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 40px); 
    min-width: 100px; 
    max-width: 200px; 
    text-align: center;
    overflow: hidden;
    padding: 10px;
}

.animal-image {
    max-width: 140px;
    height: auto;
    border-radius: 5px;
}

.card-body {
    margin-top: 15px;
}

.btn {
    display: inline-block;
    text-decoration: none;
    padding: 8px 15px;
    border-radius: 5px;
    color: white;
    margin-top: 10px;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-danger {
    background-color: #dc3545;
}

h4 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

</style>
