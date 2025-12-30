<?php
include '../config/db.php';
header('Content-Type: application/json');

// SQL query to fetch required data from the audit_log table
$sql = "SELECT log_id, table_name, action, description, log_time FROM audit_log ORDER BY log_time DESC";
$result = $conn->query($sql);

// Initialize the response array
$response = [
    'success' => false, // Default to false in case of failure
    'message' => 'No logs found',
    'data' => []
];

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row; // Add each log entry to the data array
    }
    $response['success'] = true; // Set success to true if there are results
    $response['message'] = 'Audit logs fetched successfully';
} 

// Return the results as JSON
echo json_encode($response);

// Close the database connection
$conn->close();
?>
