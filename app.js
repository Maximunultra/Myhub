// Load the model once the page loads
let model;
async function loadModel() {
    model = await mobilenet.load();
    console.log("Model loaded successfully");
}

loadModel();

// Function to handle image upload and prediction
document.getElementById("imageUpload").addEventListener("change", async (event) => {
    // Get the uploaded file
    const file = event.target.files[0];
    if (!file) return;

    // Display the image in the <img> tag
    const imgElement = document.getElementById("image");
    imgElement.src = URL.createObjectURL(file);
    imgElement.style.display = "block";

    // Wait for the image to load before making a prediction
    imgElement.onload = async () => {
        const predictions = await classifyImage(imgElement);
        displayResults(predictions);
    };
});

// Function to classify the image
async function classifyImage(image) {
    // Make predictions with the model
    const predictions = await model.classify(image);
    return predictions;
}

// Function to display results
function displayResults(predictions) {
    const resultElement = document.getElementById("result");
    resultElement.innerHTML = ""; // Clear previous results

    predictions.forEach((prediction, index) => {
        const { className, probability } = prediction;
        const confidence = (probability * 100).toFixed(2); // Convert to percentage

        resultElement.innerHTML += `<p>${index + 1}. ${className} - Confidence: ${confidence}%</p>`;
    });
}
