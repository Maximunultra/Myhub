<?php 
include ('./include/breed_tool.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class=" min-h-screen flex flex-col items-center px-4 py-8">
        <!-- Header Section -->
        <div class="w-full max-w-4xl bg-white shadow-md  rounded-lg p-6 mb-6 mr-28">
            <h1 class="text-3xl font-bold text-gray-800 text-center">Resources for Pet Breed Classification</h1>
            <p class="text-lg text-gray-600 text-center mt-4">
                Explore our curated resources to help you understand and identify various pet breeds. Whether you're a pet owner, enthusiast, or researcher, these tools and references are designed to support your needs.
            </p>
        </div>

        <!-- Resource Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl">
            <!-- Resource Card 1 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pet Classification Guide</h3>
                <p class="text-gray-600 mb-4">
                    A comprehensive guide to identifying common pet breeds, including cats, dogs, and more.
                </p>
                <a href="#" class="text-blue-600 hover:underline">Download Guide &rarr;</a>
            </div>
            <!-- Resource Card 2 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Interactive Tutorials</h3>
                <p class="text-gray-600 mb-4">
                    Step-by-step tutorials on how to use the classification system effectively.
                </p>
                <a href="#" class="text-blue-600 hover:underline">Access Tutorials &rarr;</a>
            </div>
            <!-- Resource Card 3 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pet Care Tips</h3>
                <p class="text-gray-600 mb-4">
                    Learn essential care tips for various breeds to ensure their health and well-being.
                </p>
                <a href="#" class="text-blue-600 hover:underline">Read More &rarr;</a>
            </div>
            <!-- Resource Card 4 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Breed Database</h3>
                <p class="text-gray-600 mb-4">
                    Browse our extensive database of pet breeds, complete with images and descriptions.
                </p>
                <a href="#" class="text-blue-600 hover:underline">View Database &rarr;</a>
            </div>
            <!-- Resource Card 5 -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Scientific Research</h3>
                <p class="text-gray-600 mb-4">
                    Access scientific studies and articles on pet genetics and breed classification.
                </p>
                <a href="#" class="text-blue-600 hover:underline">Explore Research &rarr;</a>
            </div>
        
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Community Forums</h3>
                <p class="text-gray-600 mb-4">
                    Join our forums to discuss pet breeds and share knowledge with others.
                </p>
                <a href="#" class="text-blue-600 hover:underline">Visit Forums &rarr;</a>
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
