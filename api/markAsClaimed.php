<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/db.php';
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['scheduleId'])) {
    echo json_encode(["success" => false, "message" => "Missing scheduleId"]);
    exit;
}

$scheduleId = intval($input['scheduleId']);

$sql = "UPDATE resolve_schedule SET status = 'claimed' WHERE schedule_id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "SQL error", "details" => $conn->error]);
    exit;
}

$stmt->bind_param("i", $scheduleId);
$success = $stmt->execute();

echo json_encode(["success" => $success]);
?>
