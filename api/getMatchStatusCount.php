<?php
include '../config/db.php';
header('Content-Type: application/json');

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT final_status, COUNT(*) as count 
        FROM matches 
        GROUP BY final_status";

$result = $conn->query($sql);

$data = [
    "resolve" => 0,
    "unresolve" => 0,
    "cancelled" => 0
];

while ($row = $result->fetch_assoc()) {
    $status = $row['final_status'];
    $data[$status] = (int)$row['count'];
}

echo json_encode($data);
$conn->close();
?>
