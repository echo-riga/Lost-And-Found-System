<?php
include '../config/db.php';

$query = "SELECT COUNT(*) AS lost_count FROM items WHERE type = 'lost'";
$result = $conn->query($query);

$count = 0;
if ($result && $row = $result->fetch_assoc()) {
    $count = intval($row['lost_count']);
}

echo json_encode(['count' => $count]);
?>
