<?php 
include ('./include/breed_tool.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Classifier</title>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>
    <style>
   body {
    
    margin: 0;
    background-color: #eef2f3;
}

h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 2em;
    text-align: center;
}

.tool-cont {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 100vh;
    max-width: 100%;
    text-align: center; /* Center text and inline elements */
}

input[type="file"] {
    display: block;
    margin: 20px auto;
    padding: 12px;
    border: 2px solid #4CAF50;
    border-radius: 8px;
    background-color: #ffffff;
    cursor: pointer;
    font-size: 1em;
    color: #4CAF50;
    transition: all 0.3s ease;
}

input[type="file"]:hover {
    background-color: #4CAF50;
    color: #ffffff;
}

#image {
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    height: auto;
}

#result {
    font-size: 18px;
    color: #333;
    margin-top: 20px;
    text-align: center;
    font-weight: bold;
}


    </style>
</head>
<body>
    <div class="tool-cont">
    <h1>Animal Image Classifier</h1>
    <input type="file" id="imageUpload" accept="image/*">
    <img id="image" width="224" height="224" style="display: none;">
    <p id="result"></p>
    </div>
    <script src="app.js"></script>

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


