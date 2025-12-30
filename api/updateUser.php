<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$id = $data['id']; 
$name = $data['name'];
$email = $data['email'];
$password = !empty($data['password']) ? $data['password'] : null; 
$role = $data['role'];
$auth_method = $data['auth_method']; 
$img_url = isset($data['img_url']) ? $data['img_url'] : null; // Optional image URL

if ($password) {
    if ($img_url) {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', auth_method='$auth_method', role='$role', img_url='$img_url' WHERE user_id='$id'";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', auth_method='$auth_method', role='$role' WHERE user_id='$id'";
    }
} else {
    if ($img_url) {
        $sql = "UPDATE users SET name='$name', email='$email', auth_method='$auth_method', role='$role', img_url='$img_url' WHERE user_id='$id'";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email', auth_method='$auth_method', role='$role' WHERE user_id='$id'";
    }
}

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
