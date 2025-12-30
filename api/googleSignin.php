<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['email'])) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$email = $data['email'];

$checkSql = "SELECT user_id, name, img_url, role FROM users WHERE email = '$email' AND auth_method = 'google'";
$result = $conn->query($checkSql);

if ($result && $result->num_rows > 0) {
    // User exists
    $user = $result->fetch_assoc();
    echo json_encode([
        "success" => true,
        "message" => "User logged in",
        "user" => [
            "user_id" => $user['user_id'],
            "name" => $user['name'],
            "role" => $user['role'],  // Include the role here
            "img_url" => $user['img_url']
        ]
    ]);
} else {
    echo json_encode(["success" => false, "message" => "User not found"]);
}

$conn->close();
?>
