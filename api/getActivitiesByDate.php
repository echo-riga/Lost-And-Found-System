<?php
include '../config/db.php';

// Query to get the count of logs for the last 7 days, grouped by date
$sql = "SELECT DATE(log_time) AS log_date, COUNT(*) AS log_count
        FROM audit_log
        WHERE log_time >= CURDATE() - INTERVAL 7 DAY
        GROUP BY log_date
        ORDER BY log_date ASC"; // Grouping by date and ordering in ascending order

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an array to store the results
    $data = array();
    
    // Fetch each row and add it to the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'log_date' => $row['log_date'],   // The date of the log
            'log_count' => (int)$row['log_count']  // The count of logs for that date
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
