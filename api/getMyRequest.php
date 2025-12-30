<?php
include '../config/db.php';

$input = json_decode(file_get_contents("php://input"), true);
$userId = intval($input['userId']);

$query = "
SELECT m.*, 
       owner.user_id AS owner_user_id, 
       owner.name AS owner_item_name, 
       owner.img_url AS owner_img, 
       owner.description AS owner_item_description, 
       owner.location AS owner_item_location, 
       proof.user_id AS proof_user_id, 
       proof.name AS proof_item_name, 
       proof.img_url AS proof_img,
       proof.description AS proof_item_description, 
       proof.location AS proof_item_location,
       u.name AS owner_username
FROM matches m
JOIN items owner ON m.owner_item_id = owner.item_id
JOIN items proof ON m.proof_item_id = proof.item_id
JOIN users u ON owner.user_id = u.user_id
WHERE proof.user_id = ? AND m.final_status = 'unresolve';
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$matches = [];
while ($row = $result->fetch_assoc()) {
    $matches[] = $row;
}

echo json_encode($matches);
?>
