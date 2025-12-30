<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/db.php'; 
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['userId'])) {
    echo json_encode(["error" => "Missing userId"]);
    exit;
}

$userId = intval($input['userId']);

$sql = "
SELECT 
  m.match_id,
  rs.schedule_id,
  m.owner_item_id,
  m.proof_item_id,
  
  oi.name AS owner_item_name,
  oi.description AS owner_item_description,
  oi.location AS owner_item_location,
  oi.img_url AS owner_img,
  uo.name AS owner_username,

  pi.name AS proof_item_name,
  pi.description AS proof_item_description,
  pi.location AS proof_item_location,
  pi.img_url AS proof_img,
  up.name AS proof_username,

  rs.meetup_location,
  rs.meetup_time,
  rs.status,
  rs.created_at

FROM matches m
JOIN items oi ON m.owner_item_id = oi.item_id
JOIN users uo ON oi.user_id = uo.user_id
JOIN items pi ON m.proof_item_id = pi.item_id
JOIN users up ON pi.user_id = up.user_id
JOIN resolve_schedule rs ON m.match_id = rs.match_id

WHERE m.initiator_accepted = 1 
  AND m.owner_accepted = 1
  AND rs.status = 'not claimed'
  AND (uo.user_id = ? OR up.user_id = ?)

ORDER BY rs.created_at DESC
";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["error" => "Failed to prepare SQL", "details" => $conn->error]);
    exit;
}

$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();
$result = $stmt->get_result();

$matches = [];
while ($row = $result->fetch_assoc()) {
    $row['meetup_time'] = date("F j, Y, g:i A", strtotime($row['meetup_time']));
    $matches[] = $row;
}

echo json_encode($matches);
?>
