<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Form -->
    <form id="uploadForm" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg w-96">
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Choose an image:</label>
            <input type="file" name="image" id="image" accept="image/*" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-semibold mb-2">Type</label>
            <input type="text" name="type" id="type" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="breed" class="block text-gray-700 font-semibold mb-2">Breed Name</label>
            <input type="text" name="breed" id="breed" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="lifespan" class="block text-gray-700 font-semibold mb-2">Lifespan</label>
            <input type="text" name="lifespan" id="lifespan" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <input type="text" name="description" id="description" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>

        <button type="submit"
            class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
            Upload Image
        </button>
    </form>

    <!-- Modal -->
    <div id="uploadModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-80">
            <button class="close-btn text-gray-700 text-xl font-bold float-right hover:text-red-500">&times;</button>
            <p id="modalMessage" class="text-gray-800 mt-4">Image uploaded successfully!</p>
        </div>
    </div>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function (e) {
            e.preventDefault(); 
            var formData = new FormData(this);
            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) 
            .then(data => {
                document.getElementById('modalMessage').textContent = data;
                document.getElementById('uploadModal').classList.remove('hidden');
            })
            .catch(error => {
                document.getElementById('modalMessage').textContent = 'Error uploading image.';
                document.getElementById('uploadModal').classList.remove('hidden');
            });
        });

        document.querySelector('.close-btn').addEventListener('click', function () {
            document.getElementById('uploadModal').classList.add('hidden');
        });

        window.onclick = function (event) {
            if (event.target === document.getElementById('uploadModal')) {
                document.getElementById('uploadModal').classList.add('hidden');
            }
        };
    </script>
</body>
</html>
