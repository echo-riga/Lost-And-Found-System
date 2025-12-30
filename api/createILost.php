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
$imageUrl = isset($data['img_url']) ? $data['img_url'] : '/system/res/default.png';
$userId = $data['user_id'];
$ownerItemId = $data['owner_item_id'];  // You must send this in the request
$type = 'lost';

// Insert the proof item
$sql = "INSERT INTO items (user_id, category_id, name, type, img_url, description, location, is_active) 
        VALUES ('$userId', '$category', '$name', '$type', '$imageUrl', '$description', '$location', FALSE)";

if ($conn->query($sql)) {
    $proofItemId = $conn->insert_id;

    // Insert into matches
    $matchSql = "INSERT INTO matches (owner_item_id, proof_item_id) VALUES ('$ownerItemId', '$proofItemId')";

    if ($conn->query($matchSql)) {
        echo json_encode(["success" => true, "match_id" => $conn->insert_id]);
    } else {
        echo json_encode(["success" => false, "message" => "Match insert failed: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Item insert failed: " . $conn->error]);
}

$conn->close();
?>
