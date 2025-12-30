<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];
$role = $data['role'];
$auth_method = $data['auth_method'];
$img_url = isset($data['img_url']) ? $data['img_url'] : null;

if ($img_url) {
    $sql = "INSERT INTO users (name, email, password, auth_method, role, img_url) 
            VALUES ('$name', '$email', '$password', '$auth_method', '$role', '$img_url')";
} else {
    $sql = "INSERT INTO users (name, email, password, auth_method, role) 
            VALUES ('$name', '$email', '$password', '$auth_method', '$role')";
}

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>