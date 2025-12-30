<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (
    !$data ||
    !isset($data['name']) ||
    !isset($data['email']) ||
    !isset($data['img_url'])
) {
    echo json_encode(["success" => false, "message" => "Invalid JSON data"]);
    exit;
}

$name = $data['name'];
$email = $data['email'];
$imgUrl = $data['img_url'];

$checkStmt = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND auth_method = 'facebook'");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows === 0) {
    // Insert only if user doesn't exist
    $insertStmt = $conn->prepare(
        "INSERT INTO users (name, email, password, auth_method, role, img_url)
         VALUES (?, ?, NULL, 'facebook', 'user', ?)"
    );
    $insertStmt->bind_param("sss", $name, $email, $imgUrl);

    if ($insertStmt->execute()) {
        echo json_encode(["success" => true, "message" => "User registered"]);
    } else {
        error_log("Database error: " . $insertStmt->error);
        echo json_encode(["success" => false, "message" => "Database error"]);
    }

    $insertStmt->close();
} else {
    echo json_encode(["success" => false, "message" => "User already exists"]);
}

$checkStmt->close();
$conn->close();
?>
