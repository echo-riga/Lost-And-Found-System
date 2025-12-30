<?php
include '../config/db.php';
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['matchId'])) {
    echo json_encode(["success" => false, "message" => "Match ID missing."]);
    exit;
}

$matchId = intval($data['matchId']);

$stmt = $conn->prepare("UPDATE matches SET final_status = 'cancelled' WHERE match_id = ?");
$stmt->bind_param("i", $matchId);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Update failed."]);
}

$stmt->close();
$conn->close();
?>
