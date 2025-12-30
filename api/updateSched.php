<?php
include '../config/db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$location = $data['location'] ?? '';
$interval = $data['interval'] ?? '';

$response = ['success' => false];

if ($location && is_numeric($interval)) {
    $stmt = $conn->prepare("UPDATE config SET config_location = ?, config_interval = ? WHERE config_id = 1");
    $stmt->bind_param("si", $location, $interval);

    if ($stmt->execute()) {
        $response['success'] = true;
    }

    $stmt->close();
}

echo json_encode($response);
$conn->close();
?>
