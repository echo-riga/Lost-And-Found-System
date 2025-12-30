<?php
include '../config/db.php';
header("Content-Type: application/json");

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);

$name = isset($input['name']) ? trim($input['name']) : '';
$role = isset($input['role']) ? trim($input['role']) : '';
$createdAt = isset($input['created_at']) ? trim($input['created_at']) : '';

// Base SQL query
$sql = "SELECT user_id, name, email, password, auth_method, role, img_url, created_at FROM users WHERE 1=1";
$params = [];
$types = "";

// Add filters dynamically
if ($name !== '') {
    $sql .= " AND name LIKE ?";
    $params[] = "%$name%";
    $types .= "s";
}

if ($role !== '') {
    $sql .= " AND role = ?";
    $params[] = $role;
    $types .= "s";
}

if ($createdAt !== '') {
    // Assuming created_at stored as datetime, filter by date only
    $sql .= " AND DATE(created_at) = ?";
    $params[] = $createdAt;
    $types .= "s";
}

$sql .= " ORDER BY created_at DESC";

// Prepare and execute
$stmt = $conn->prepare($sql);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $users = [];

    while ($row = $result->fetch_assoc()) {
        $row['created_at'] = date("F j, Y", strtotime($row['created_at']));
        $users[] = $row;
    }

    echo json_encode(["success" => true, "data" => $users]);
} else {
    echo json_encode(["success" => false, "message" => "No users found"]);
}

$stmt->close();
$conn->close();
?>
