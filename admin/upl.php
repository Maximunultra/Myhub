<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form Styles */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="file"] {
            padding: 3px;
        }

        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 4px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-btn {
            color: #000;
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover {
            color: red;
        }
    </style>
</head>
<body>

    <!-- Form -->
    <form id="uploadForm" enctype="multipart/form-data">
        <div>
            <label for="image">Choose an image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" required>
        </div>

        <div>
            <label for="breed">Breed Name</label>
            <input type="text" name="breed" id="breed" required>
        </div>

        <div>
            <label for="lifespan">Lifespan</label>
            <input type="text" name="lifespan" id="lifespan" required>
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>
        </div>

        <input type="submit" value="Upload Image">
    </form>

    
    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <p id="modalMessage">Image uploaded successfully!</p>
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
            .then(response => response.text()) // Parse the response as text
            .then(data => {
                
                document.getElementById('modalMessage').textContent = data;
                document.getElementById('uploadModal').style.display = 'block';
            })
            .catch(error => {
               
                document.getElementById('modalMessage').textContent = 'Error uploading image.';
                document.getElementById('uploadModal').style.display = 'block';
            });
        });

       
        document.querySelector('.close-btn').addEventListener('click', function () {
            document.getElementById('uploadModal').style.display = 'none';
        });

        
        window.onclick = function (event) {
            if (event.target === document.getElementById('uploadModal')) {
                document.getElementById('uploadModal').style.display = 'none';
            }
        };
    </script>
</body>
</html>
