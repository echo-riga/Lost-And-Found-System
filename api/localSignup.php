<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if ($data === null) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];

$stmt = $conn->prepare("INSERT INTO users (name, email, password, auth_method, role) 
                        VALUES (?, ?, ?, 'local', 'user')");
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    if ($conn->errno === 1062) {
        echo json_encode(["error" => "Email already registered"]);
    } else {
        echo json_encode(["error" => "Registration failed"]);
    }
}

$stmt->close();
$conn->close();
?>
