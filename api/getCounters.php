<?php
include '../config/db.php';

// Query to get the count of lost and found items, users, and categories
$sql = "
    SELECT 
        (SELECT COUNT(*) FROM items WHERE type = 'lost') AS lost_items,
        (SELECT COUNT(*) FROM items WHERE type = 'found') AS found_items,
        (SELECT COUNT(*) FROM users) AS users_count,
        (SELECT COUNT(*) FROM categories) AS categories_count
";

// Execute the query
$result = $conn->query($sql);

// Check if the query returns any result
if ($result->num_rows > 0) {
    // Fetch the result row
    $row = $result->fetch_assoc();

    // Prepare the response data
    $data = array(
        'lost_items' => (int)$row['lost_items'],
        'found_items' => (int)$row['found_items'],
        'users_count' => (int)$row['users_count'],
        'categories_count' => (int)$row['categories_count']
    );

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // If no results, return an empty array
    echo json_encode([]);
}

$conn->close();
?>
