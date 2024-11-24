<?php
require_once '../constant/config.php';
session_start();

// Redirect to login if not authenticated as admin
if (!isset($_SESSION['admin'])) {
    header('location: log.php');
    exit();
}

// Fetch record data if `id` is set in GET request
$fetch = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM images WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    if ($fetch) {
        $type = $_POST['type'];
        $breed = $_POST['breed'];
        $lifespan = $_POST['lifespan'];
        $description = $_POST['description'];
        $status = $_POST['status'] ?? 'enabled';

        $file_path = $fetch['file_path']; // Default to current file path
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image']['name'];
            $tmp_loc = $_FILES['image']['tmp_name'];
            $file_path = "images/" . $file_name;
            move_uploaded_file($tmp_loc, $file_path);
        } else {
            $file_path = $_POST['current_image'] ?? $file_path;
        }

        $id = $_POST['id'];

        $update_stmt = $conn->prepare(
            "UPDATE images SET file_path=:file_path, type=:type, breed=:breed, lifespan=:lifespan, description=:description, status=:status WHERE id=:id"
        );

        $updated = $update_stmt->execute([
            ':file_path' => $file_path,
            ':type' => $type,
            ':breed' => $breed,
            ':lifespan' => $lifespan,
            ':description' => $description,
            ':status' => $status,
            ':id' => intval($id)
        ]);

        if ($updated){
            echo "<script>alert('Updated Successfully');</script>";
            echo "<script>window.location.href = 'display.php?id=" . $id . "';</script>";
            exit();
        } else {
            echo "<script>alert('Error updating record!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Editor Page</h1>
        
        <form action="" method="post" enctype="multipart/form-data" class="space-y-4" onsubmit="return confirm('Are you sure you want to edit this information?');">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($fetch['id'] ?? '', ENT_QUOTES); ?>">

            <!-- Type -->
            <div>
                <label for="type" class="block text-gray-700 font-medium mb-1">Type:</label>
                <input type="text" id="type" name="type" 
                       value="<?php echo htmlspecialchars($fetch['type'] ?? '', ENT_QUOTES); ?>" 
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" 
                       required>
            </div>

            <!-- Breed -->
            <div>
                <label for="breed" class="block text-gray-700 font-medium mb-1">Breed:</label>
                <input type="text" id="breed" name="breed" 
                       value="<?php echo htmlspecialchars($fetch['breed'] ?? '', ENT_QUOTES); ?>" 
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" 
                       required>
            </div>

            <!-- Lifespan -->
            <div>
                <label for="lifespan" class="block text-gray-700 font-medium mb-1">Lifespan:</label>
                <input type="text" id="lifespan" name="lifespan" 
                       value="<?php echo htmlspecialchars($fetch['lifespan'] ?? '', ENT_QUOTES); ?>" 
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" 
                       required>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-1">Image:</label>
                <input type="file" id="image" name="image" 
                       class="w-full px-4 py-2 border rounded-lg">
                <?php if ($fetch && !empty($fetch['file_path'])): ?>
                    <div class="mt-4">
                        <img src="<?php echo htmlspecialchars($fetch['file_path'], ENT_QUOTES); ?>" 
                             alt="Current Image" 
                             class="w-40 h-auto rounded-lg shadow-md">
                        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($fetch['file_path'], ENT_QUOTES); ?>">
                    </div>
                <?php endif; ?>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description:</label>
                <textarea id="description" name="description" 
                          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"><?php echo htmlspecialchars($fetch['description'] ?? '', ENT_QUOTES); ?></textarea>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-1">Status:</label>
                <select name="status" id="status" 
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="enabled" <?php echo ($fetch['status'] ?? '') === 'enabled' ? 'selected' : ''; ?>>Enabled</option>
                    <option value="disabled" <?php echo ($fetch['status'] ?? '') === 'disabled' ? 'selected' : ''; ?>>Disabled</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <button type="submit" name="submit" 
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Submit
                </button>
                <button type="reset" 
                        class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 focus:ring focus:ring-gray-300">
                    Reset
                </button>
            </div>
        </form>
    </div>
</body>
</html>
