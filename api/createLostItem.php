<?php
include '../config/db.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

// Collect item data from the request
$name = $data['name'];
$description = $data['description'];
$location = $data['location'];
$category = $data['category'];
$imageUrl = isset($data['img_url']) ? $data['img_url'] : '/system/res/default.png';  // Default image if not provided
$userId = $data['user_id'];  // Assuming user ID is passed in the request

// Set type as 'lost' (you can change this depending on your item status)
$type = 'lost';

// Prepare the SQL query
$sql = "INSERT INTO items (user_id, category_id, name, type, img_url, description, location, is_active) 
        VALUES ('$userId', '$category', '$name', '$type', '$imageUrl', '$description', '$location', TRUE)";

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error: " . $conn->error,
        "sql" => $sql  // Log the SQL query for debugging
    ]);
}

$conn->close();
?>
