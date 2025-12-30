<?php
include '../config/db.php';
header('Content-Type: application/json');

$sql = "
SELECT 
  rs.schedule_id,
  
  u_owner.name AS owner_username,
  i_owner.name AS owner_item_name,
  
  u_proof.name AS proof_username,
  i_proof.name AS proof_item_name,
  
  rs.meetup_location,
  rs.meetup_time,
  rs.status,
  rs.created_at
  
FROM resolve_schedule rs
JOIN matches m ON rs.match_id = m.match_id

JOIN items i_owner ON m.owner_item_id = i_owner.item_id
JOIN users u_owner ON i_owner.user_id = u_owner.user_id

JOIN items i_proof ON m.proof_item_id = i_proof.item_id
JOIN users u_proof ON i_proof.user_id = u_proof.user_id

ORDER BY rs.created_at DESC
";

$result = $conn->query($sql);

$response = [
    'success' => false,
    'message' => 'No cases found',
    'data' => []
];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format dates like "May 18 2025 10:23 pm"
        $row['meetup_time'] = !empty($row['meetup_time']) ? date("F j Y g:i a", strtotime($row['meetup_time'])) : null;
        $row['created_at'] = !empty($row['created_at']) ? date("F j Y g:i a", strtotime($row['created_at'])) : null;
        
        $response['data'][] = $row;
    }
    $response['success'] = true;
    $response['message'] = 'Cases fetched successfully';
}

echo json_encode($response);
$conn->close();
?>
