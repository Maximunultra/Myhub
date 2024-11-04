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
</body>
</html>
