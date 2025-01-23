<?php
// Database connection parameters
$host = 'localhost'; 
$username = 'root';  
$password = '';     
$database = 'detected'; 

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle image upload and database update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image data from the POST request
    $imageData = $_POST['image'];

    // Remove the "data:image/png;base64," if it exists
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = base64_decode($imageData);

    // Generate a unique filename for the image and save it
    $fileName = 'detected_images/' . uniqid() . '.png'; // Change this to your folder if needed
    file_put_contents($fileName, $imageData);

    // Insert image record in the database (with timestamp)
    $stmt = $conn->prepare("INSERT INTO detected (image_path, timestamp) VALUES (?, ?)");
    $timestamp = date("Y-m-d H:i:s");
    $stmt->bind_param("ss", $fileName, $timestamp);
    $stmt->execute();

    // Update the detection counter in the database
    $conn->query("UPDATE detection_counter SET count = count + 1 WHERE id = 1");

    // Close the statement and connection
    $stmt->close();

    echo "Image saved.";
    exit;
}

// Retrieve the current detection count
$result = $conn->query("SELECT count FROM detection_counter WHERE id = 1");
$row = $result->fetch_assoc();
$count = $row['count'];

// Close the database connection
$conn->close();
?>
