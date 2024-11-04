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
    // Data fetched successfully
    if ($fetch) {
        $type = $_POST['type'];
        $breed = $_POST['breed'];
        $lifespan = $_POST['lifespan'];
        $description = $_POST['description'];
        $status = $_POST['status'] ?? 'enabled';

        // Handle image upload if provided
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

        // Prepare update query with PDO
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
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/Myhub/style.css">
</head>
<body>
<h1>Editor Page</h1>
<div class="submit-news-form">
    <form action="" method="post" enctype="multipart/form-data" <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to edit this information?');">
    >
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($fetch['id'] ?? '', ENT_QUOTES); ?>">
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($fetch['type'] ?? '', ENT_QUOTES); ?>" required><br>

        <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed" value="<?php echo htmlspecialchars($fetch['breed'] ?? '', ENT_QUOTES); ?>" required><br>

        <label for="lifespan">Lifespan:</label>
        <input type="text" id="lifespan" name="lifespan" value="<?php echo htmlspecialchars($fetch['lifespan'] ?? '', ENT_QUOTES); ?>" required><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br>
        <?php if ($fetch && !empty($fetch['file_path'])): ?>
            <img src="<?php echo htmlspecialchars($fetch['file_path'], ENT_QUOTES); ?>" alt="Current Image" style="max-width: 200px; padding-top: 10px;"><br>
            <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($fetch['file_path'], ENT_QUOTES); ?>">
        <?php endif; ?>

        <br><br>
        <label for="description">Description:</label>
        <textarea id="textarea" name="description"><?php echo htmlspecialchars($fetch['description'] ?? '', ENT_QUOTES); ?></textarea><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="enabled" <?php echo ($fetch['status'] ?? '') === 'enabled' ? 'selected' : ''; ?>>Enabled</option>
            <option value="disabled" <?php echo ($fetch['status'] ?? '') === 'disabled' ? 'selected' : ''; ?>>Disabled</option>
        </select><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>
</html>
