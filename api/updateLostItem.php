<?php
include '../config/db.php';
header("Content-Type: application/json");

// Get input data
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "Invalid JSON data"]);
    exit;
}

// Extract variables from input data
$itemId = $data['item_id'];
$categoryId = $data['category_id'];
$name = $data['name'];
$type = $data['type'];
$description = isset($data['description']) ? $data['description'] : null;
$location = isset($data['location']) ? $data['location'] : null;
$imgUrl = isset($data['img_url']) ? $data['img_url'] : null;
$status = isset($data['status']) ? $data['status'] : 1; // Default to active (1) if not provided


// Start building the SQL update query
$sql = "UPDATE items SET 
            category_id = ?, 
            name = ?, 
            type = ?, 
            is_active = ?";  // Set base fields first

// Prepare the parameters for binding
$params = [$categoryId, $name, $type, $status];

// Add the optional fields to the SQL query only if they are provided
if ($description !== null) {
    $sql .= ", description = ?";
    $params[] = $description;
}

if ($location !== null) {
    $sql .= ", location = ?";
    $params[] = $location;
}

if ($imgUrl !== null) {
    $sql .= ", img_url = ?";
    $params[] = $imgUrl;
}

// Continue with the WHERE clause
$sql .= " WHERE item_id = ?";

// Add the item_id to the parameters for the WHERE clause
$params[] = $itemId;

// Prepare the SQL query
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(["success" => false, "message" => "Failed to prepare SQL statement"]);
    exit;
}

// Bind the parameters to the statement
$stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);

// Execute the prepared statement
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
