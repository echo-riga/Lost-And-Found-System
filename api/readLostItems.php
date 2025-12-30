<?php
include '../config/db.php';
header("Content-Type: application/json");

// Collect filters from JSON POST body
$input = json_decode(file_get_contents('php://input'), true);

$status = isset($input['status']) ? $input['status'] : '';
$name = isset($input['name']) ? $input['name'] : '';
$date = isset($input['created_at']) ? $input['created_at'] : '';

// Base SQL with joins and fixed type filter
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
        WHERE items.type = 'lost'";

$where = [];

// Add filters if present
if ($status !== '') {
    // Assuming is_active is stored as integer 1 or 0
    $where[] = "items.is_active = " . ($status === '1' ? '1' : '0');
}

if ($name !== '') {
    $nameEscaped = $conn->real_escape_string($name);
    $where[] = "items.name LIKE '%$nameEscaped%'";
}

if ($date !== '') {
    $dateEscaped = $conn->real_escape_string($date);
    // Filter items created on this date (ignoring time)
    $where[] = "DATE(items.created_at) = '$dateEscaped'";
}

if (count($where) > 0) {
    $sql .= " AND " . implode(" AND ", $where);
}

// Sort by latest created_at descending
$sql .= " ORDER BY items.created_at DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $lostItems = [];

    while ($row = $result->fetch_assoc()) {
        // Format created_at to "May 6, 2025 10:00 PM"
        $row['created_at'] = date("F j, Y g:i A", strtotime($row['created_at']));
        $lostItems[] = $row;
    }

    echo json_encode(["success" => true, "data" => $lostItems]);
} else {
    echo json_encode(["success" => false, "message" => "No lost items found"]);
}

$conn->close();
?>
