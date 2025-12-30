<?php
include '../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!$data || !isset($data['type']) || !isset($data['category_id'])) {
    echo json_encode(["error" => "Invalid JSON data"]);
    exit;
}

$type = $conn->real_escape_string($data['type']);
$categoryId = intval($data['category_id']);
$nameSearch = isset($data['name']) ? trim($conn->real_escape_string($data['name'])) : '';
$dateFilter = isset($data['date']) ? trim($conn->real_escape_string($data['date'])) : '';

// Base WHERE clause
$whereClause = "WHERE items.type = '$type' AND items.is_active = TRUE";

// Add category filter
if ($categoryId !== 1) {
    $whereClause .= " AND items.category_id = $categoryId";
}

// Add name search filter (if provided)
if (!empty($nameSearch)) {
    $whereClause .= " AND items.name LIKE '%$nameSearch%'";
}

// Add date filter (if provided)
if (!empty($dateFilter)) {
    // Assuming you want to filter items created on or after the given date
    // Format: YYYY-MM-DD (from the date input)
    $whereClause .= " AND DATE(items.created_at) >= '$dateFilter'";
}

$sql = "SELECT 
            items.item_id, 
            items.user_id, 
            users.name AS user_name,
            users.email AS user_email,
            users.img_url AS user_img_url,
            items.category_id, 
            categories.name AS category_name,
            items.name, 
            items.type, 
            items.img_url AS item_img_url, 
            items.description, 
            items.location, 
            items.is_active, 
            items.created_at
        FROM items
        INNER JOIN users ON items.user_id = users.user_id
        INNER JOIN categories ON items.category_id = categories.category_id
        $whereClause";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $items = [];

    while ($row = $result->fetch_assoc()) {
        $row['created_at'] = date("F j, Y g:i A", strtotime($row['created_at']));
        $items[] = $row;
    }

    echo json_encode([
        "success" => true,
        "message" => "Items fetched successfully",
        "data" => $items
    ]);
} else {
    echo json_encode(["success" => false, "message" => "No items found"]);
}

$conn->close();
?>
