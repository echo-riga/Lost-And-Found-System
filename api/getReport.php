<?php
header('Content-Type: application/json');
include '../config/db.php';

$input = json_decode(file_get_contents('php://input'), true);
$reportDate = isset($input['date']) ? $input['date'] : null;

if (!$reportDate) {
    http_response_code(400);
    echo json_encode(['error' => 'Date is required']);
    exit;
}

$sql = "
    SELECT 
        i.item_id,
        u.name AS owner_name,
        u.email,
        i.name AS item_name,
        c.name AS category,
        i.type,
        i.description,
        i.location,
        DATE_FORMAT(i.created_at, '%M %e, %Y') AS created_at,
        CASE i.is_active
            WHEN 1 THEN 'Active'
            WHEN 0 THEN 'Inactive'
            ELSE 'Unknown'
        END AS status
    FROM items i
    LEFT JOIN users u ON i.user_id = u.user_id
    LEFT JOIN categories c ON i.category_id = c.category_id
    WHERE DATE(i.created_at) = ?
    ORDER BY i.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $reportDate);
$stmt->execute();
$result = $stmt->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);
?>
