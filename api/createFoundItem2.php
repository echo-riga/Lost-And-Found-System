<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$userId = $data['user_id'];
$name = $data['name'];
$description = $data['description'];
$location = $data['location'];
$categoryId = $data['category_id'];
$type = 'found';
$imgUrl = isset($data['img_url']) ? $data['img_url'] : null;

if ($imgUrl) {
    $sql = "INSERT INTO items (user_id, category_id, name, type, img_url, description, location) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssss", $userId, $categoryId, $name, $type, $imgUrl, $description, $location);
} else {
    $sql = "INSERT INTO items (user_id, category_id, name, type, description, location) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissss", $userId, $categoryId, $name, $type, $description, $location);
}

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
