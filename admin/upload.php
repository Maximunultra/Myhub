<?php
require_once '../constant/config.php';

// Directory to store images
$targetDir = "images/";
$imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$targetFile = $targetDir . uniqid() . '.' . $imageFileType;

// Check if the image file is valid
if (isset($_FILES["image"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert the file path and form inputs into the database
            $stmt = $conn->prepare("INSERT INTO images (file_path, type, breed, lifespan, description) 
                                    VALUES (:file_path, :type, :breed, :lifespan, :description)");
            $stmt->execute([
                'file_path' => $targetFile,
                'type' => $_POST['type'],
                'breed' => $_POST['breed'],
                'lifespan' => $_POST['lifespan'],
                'description' => $_POST['description']
            ]);

            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded along with other details.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>
