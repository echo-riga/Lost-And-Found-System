<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM users 
        WHERE email = ? 
        AND password = ? 
        AND auth_method = 'local' 
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    echo json_encode([
        "success" => true,
        "user" => [
            "user_id" => $user['user_id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "role" => $user['role'],
            "img_url" => $user['img_url'] ? $user['img_url'] : null 
        ]
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}

$conn->close();
?>
