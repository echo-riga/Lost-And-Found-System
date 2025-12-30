<?php
include '../config/db.php';
header("Content-Type: application/json");

// Read the POSTed JSON body
$input = json_decode(file_get_contents('php://input'), true);

$status = isset($input['status']) && ($input['status'] === '0' || $input['status'] === '1') ? $input['status'] : null;
$name = isset($input['name']) ? trim($input['name']) : '';
$createdAt = isset($input['created_at']) ? trim($input['created_at']) : '';

// Build WHERE conditions
$whereClauses = ["items.type = 'found'"];  // always filter for found items

if ($status !== null) {
    $whereClauses[] = "items.is_active = " . intval($status);
}

if ($name !== '') {
    // Use prepared statement later for security - for now basic escaping
    $escapedName = $conn->real_escape_string($name);
    $whereClauses[] = "items.name LIKE '%$escapedName%'";
}

if ($createdAt !== '') {
    // Expecting date format YYYY-MM-DD from input
    $escapedDate = $conn->real_escape_string($createdAt);
    $whereClauses[] = "DATE(items.created_at) = '$escapedDate'";
}

$whereSQL = implode(' AND ', $whereClauses);

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
        WHERE $whereSQL
        ORDER BY items.created_at DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $foundItems = [];

    while ($row = $result->fetch_assoc()) {
        $row['created_at'] = date("F j, Y g:i A", strtotime($row['created_at']));
        $foundItems[] = $row;
    }

    echo json_encode(["success" => true, "data" => $foundItems]);
} else {
    echo json_encode(["success" => false, "message" => "No found items found"]);
}

$conn->close();
?>
