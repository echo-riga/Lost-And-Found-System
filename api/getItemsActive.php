<?php
include '../config/db.php';
header('Content-Type: application/json');


if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$sql = "
    SELECT is_active, COUNT(*) AS count
    FROM items
    GROUP BY is_active
";
$result = $conn->query($sql);

$data = [
    'active' => 0,
    'inactive' => 0
];

while ($row = $result->fetch_assoc()) {
    if ($row['is_active'] == 1) {
        $data['active'] = (int)$row['count'];
    } else {
        $data['inactive'] = (int)$row['count'];
    }
}

echo json_encode($data);
$conn->close();
?>
