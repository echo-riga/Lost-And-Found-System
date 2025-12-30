<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$categoryId = $data['category_id']; 
$name = $data['name'];

$sql = "UPDATE categories SET name = '$name' WHERE category_id = '$categoryId'";

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
