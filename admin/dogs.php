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
    <script src="https://cdn.tailwindcss.com"></script>
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
            max-width: 100%;
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
                    FROM images WHERE status = 'enabled' and type = 'Dog'";

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

   <!-- Modal Profile of the user -->
    <div id="profileModal" 
     class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-96">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <h2 class="text-xl font-semibold text-gray-800">User Profile</h2>
            <button id="closeProfileModal" 
                    class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>
        <div id="modalContent" class="p-4">
            <p class="text-center text-gray-500">Loading...</p>
        </div>
        <div class="flex justify-end px-4 py-3 border-t">
            <button id="closeModalFooter" 
                    class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                Close
            </button>
        </div>
    </div>
</div>

<Script>
    document.addEventListener("DOMContentLoaded", function () {
    const openProfileModal = document.getElementById("openProfileModal");
    const closeProfileModal = document.getElementById("closeProfileModal");
    const closeModalFooter = document.getElementById("closeModalFooter");
    const profileModal = document.getElementById("profileModal");
    const modalContent = document.getElementById("modalContent");

    // Open Modal
    openProfileModal.addEventListener("click", function (e) {
        e.preventDefault();

        // Show Modal
        profileModal.classList.remove("hidden");

        // Fetch User Data
        fetch("/Myhub/profile.php")
            .then((response) => response.text())
            .then((data) => {
                modalContent.innerHTML = data; // Inject content into modal
            })
            .catch((error) => {
                modalContent.innerHTML = `<p class="text-red-500">Error loading profile data.</p>`;
                console.error(error);
            });
    });

    // Close Modal
    [closeProfileModal, closeModalFooter].forEach((btn) =>
        btn.addEventListener("click", () => {
            profileModal.classList.add("hidden");
        })
    );
});

</Script>
</body>
</html>
