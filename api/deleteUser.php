<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$id = $data['id']; 

// Prepare SQL query to delete the user
$sql = "DELETE FROM users WHERE user_id='$id'";

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
