<?php
require_once 'constant/config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['ID'])) {
    echo "User is not logged in!";
    exit;
}

$ID = $_SESSION['ID'];

try {
    $sql = "SELECT First_Name, Middle_Name, Last_Name, Gender, Age, Birthdate, Email FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $ID, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return only the profile data as HTML
        echo "
        <table class='w-full text-left table-auto'>
            <tbody>
                <tr><th class='px-2 py-1 text-gray-600'>First Name:</th><td class='px-2 py-1 text-gray-800'>{$user['First_Name']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Middle Name:</th><td class='px-2 py-1 text-gray-800'>{$user['Middle_Name']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Last Name:</th><td class='px-2 py-1 text-gray-800'>{$user['Last_Name']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Gender:</th><td class='px-2 py-1 text-gray-800'>{$user['Gender']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Age:</th><td class='px-2 py-1 text-gray-800'>{$user['Age']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Birthdate:</th><td class='px-2 py-1 text-gray-800'>{$user['Birthdate']}</td></tr>
                <tr><th class='px-2 py-1 text-gray-600'>Email:</th><td class='px-2 py-1 text-gray-800'>{$user['Email']}</td></tr>
            </tbody>
        </table>";
    } else {
        echo "User not found!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
