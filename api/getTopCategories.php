<?php
include '../config/db.php';
header('Content-Type: application/json');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        c.name AS category_name,
        SUM(CASE WHEN i.type = 'lost' THEN 1 ELSE 0 END) AS lost_count,
        SUM(CASE WHEN i.type = 'found' THEN 1 ELSE 0 END) AS found_count
    FROM items i
    JOIN categories c ON i.category_id = c.category_id
    GROUP BY c.name
    ORDER BY 
        SUM(CASE WHEN i.type = 'lost' THEN 1 ELSE 0 END) +
        SUM(CASE WHEN i.type = 'found' THEN 1 ELSE 0 END) DESC
    LIMIT 5
";

$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'category_name' => $row['category_name'],
            'lost_count' => (int)$row['lost_count'],
            'found_count' => (int)$row['found_count']
        ];
    }
}

$conn->close();
echo json_encode($data);
?>
