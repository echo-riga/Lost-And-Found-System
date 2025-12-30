<?php
include '../config/db.php';

// Query to get the user count for the past 7 days
$sql = "SELECT DATE(created_at) AS date, COUNT(*) AS user_count 
        FROM users 
        WHERE created_at >= CURDATE() - INTERVAL 7 DAY
        GROUP BY DATE(created_at)
        ORDER BY date ASC"; // grouping by date, ordering by oldest date first

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an array to store the results
    $data = array();
    
    // Fetch each row and add it to the $data array
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'date' => $row['date'],  // Display date
            'user_count' => (int)$row['user_count']
        );
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // If no results, return an empty array
    echo json_encode([]);
}

$conn->close();
?>
