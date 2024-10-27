<?php
include ('../include/admin_nav.html');
require_once '../constant/config.php';

try {
    
    $stmt = $conn->prepare("SELECT ID, file_path, type, breed, lifespan, description, status FROM images");
    $stmt->execute();

    echo "<div class='tag'><a href='upl.php'>Add</a></div>";
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
                       
        <a class='btn boolean-btn' href='toggle_status.php?ID=" . htmlspecialchars($row['ID']) . "&status=" . $row['status'] . "'>".$row['status']."</a>

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
    width: 89vw;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    padding-right: 50px; /* Adjusted for better centering */
    padding-left: 50px;
    margin: 0 auto; /* Center the container */
}

.card {
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 20px); /* Adjusted for better spacing */
    min-width: 150px; /* Slightly larger minimum width */
    max-width: 250px; /* Allows cards to expand more */
    text-align: center;
    overflow: hidden;
    padding: 10px;
    flex-grow: 1; /* Allows cards to grow to fill space */
}

.animal-image {
    max-width: 100%;
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
.boolean-btn {
    background-color: green;
    color: #ffff;
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

.tag a {
    background-color: #333adf;
    border: 1px solid white;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: #000; 
    position: relative;
    display: inline-block;
    border-radius: 5px;
    margin-bottom: 15px;
}

@media (max-width: 768px) {
    .card {
        width: calc(50% - 20px); /* Two columns on medium screens */
    }
}

@media (max-width: 480px) {
    .card {
        width: calc(100% - 20px); /* Full-width cards on very small screens */
    }
}

</style>
