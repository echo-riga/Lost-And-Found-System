<?php
include '../config/db.php';
header("Content-Type: application/json");

$sql = "SELECT category_id, name, created_at FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = [
            'category_id' => $row['category_id'],
            'name' => $row['name'],
            'created_at' => $row['created_at']
        ];
    }
    echo json_encode(["success" => true, "categories" => $categories]);
} else {
    echo json_encode(["success" => false, "message" => "No categories found"]);
}

$conn->close();
?>
