<?php
include '../config/db.php';
header('Content-Type: application/json');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the counts of lost and found items reported for the past 7 days
$sql = "SELECT DATE(created_at) as report_date,
               SUM(CASE WHEN type = 'lost' THEN 1 ELSE 0 END) as lost_count,
               SUM(CASE WHEN type = 'found' THEN 1 ELSE 0 END) as found_count
        FROM items
        WHERE created_at >= CURDATE() - INTERVAL 7 DAY
        GROUP BY report_date
        ORDER BY report_date ASC;
";

$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
