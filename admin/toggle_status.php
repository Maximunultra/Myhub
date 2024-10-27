<?php
require_once '../constant/config.php';

if (isset($_GET['ID']) && isset($_GET['status'])) {
    $id = intval($_GET['ID']);
    // Determine the new status based on the current status.
    $currentStatus = $_GET['status'];
    $newStatus = $currentStatus === 'enabled' ? 'disabled' : 'enabled';

    try {
        // Prepare the update statement.
        $stmt = $conn->prepare("UPDATE images SET status = :status WHERE ID = :id");
        $stmt->bindParam(':status', $newStatus, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: /Myhub/admin/display.php?message=Status updated successfully&ID=' . $id);
            exit();
        } else {
            echo "Failed to update status.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid request. Please provide valid ID and status parameters.";
}
?>
