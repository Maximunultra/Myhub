<?php
include ('../include/breeds.html');
require_once '../constant/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Cards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .search-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-container input[type="text"] {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-container button {
            padding: 10px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

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

        h4 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by type or breed..." 
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="card-container">
        <?php
        require_once '../constant/config.php';

        $searchTerm = $_GET['search'] ?? '';
        try {
            $sql = "SELECT ID, file_path, type, breed, lifespan, description, status 
                    FROM images WHERE status = 'enabled'";

            // Add search filter
            if (!empty($searchTerm)) {
                $sql .= " AND (type LIKE :search OR breed LIKE :search)";
            }

            $stmt = $conn->prepare($sql);

            if (!empty($searchTerm)) {
                $stmt->bindValue(':search', '%' . $searchTerm . '%');
            }

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    echo "<div class='card'>
                            <img src='" . htmlspecialchars($row['file_path']) . "' alt='Animal Image' class='animal-image'>
                            <div class='card-body'>
                                <h4>Type: " . htmlspecialchars($row["type"]) . "</h4>
                                <p><strong>Breed:</strong> " . htmlspecialchars($row["breed"]) . "</p>
                                <p><strong>Lifespan:</strong> " . htmlspecialchars($row["lifespan"]) . "</p>
                                <p><strong>Description:</strong> " . htmlspecialchars($row["description"]) . "</p>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No results found</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Connection failed: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</body>
</html>
