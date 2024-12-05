<?php 
include './include/about.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-4">About Our System</h1>
            <p class="text-lg text-gray-600 text-center mb-6">
                Welcome to our system! This platform is designed to revolutionize <strong>pet/animal classification</strong>
                by utilizing advanced AI algorithms to scan and predict animal types from uploaded or captured photos.
            </p>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="bg-blue-100 text-blue-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 3.05a7 7 0 1111.9 0L10 15l-4.95-11.95z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Mission</h3>
                        <p class="text-gray-600">
                            To provide an easy-to-use platform that enables users to accurately identify pets and animals, 
                            making it accessible for enthusiasts, researchers, and animal lovers alike.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-green-100 text-green-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-10a1 1 0 01-1.707.707L9 8.414 7.707 9.707A1 1 0 016 8.414l3-3a1 1 0 011.414 0l3 3A1 1 0 0113 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Features</h3>
                        <ul class="list-disc list-inside text-gray-600">
                            <li>AI-powered pet classification.</li>
                            <li>Seamless image uploading and scanning.</li>
                            <li>Comprehensive database integration with MySQL.</li>
                            <li>User-friendly interface with real-time feedback.</li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-purple-100 text-purple-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 3a1 1 0 00-1 1v6a1 1 0 001 1h6a1 1 0 100-2h-4.586l5.293-5.293a1 1 0 10-1.414-1.414L9 8.586V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800">Vision</h3>
                        <p class="text-gray-600">
                            To become the go-to solution for animal classification systems in the Philippines and beyond,
                            empowering users with cutting-edge AI technology.
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="index.php" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-500">
                    Go Back to Home
                </a>
            </div>
        </div>
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