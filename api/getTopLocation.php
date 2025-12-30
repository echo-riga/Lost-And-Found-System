<?php
include '../config/db.php';
header('Content-Type: application/json');

// SQL query to get the count of items for each location and limit to top 5
$sql = "SELECT location, COUNT(*) AS item_count 
        FROM items 
        WHERE location IS NOT NULL 
        GROUP BY location 
        ORDER BY item_count DESC 
        LIMIT 5";  // Limit to top 5 locations

$result = $conn->query($sql);

$locations = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch each row of data
    while($row = $result->fetch_assoc()) {
        $locations[] = array(
            'location' => $row['location'],   // The location name
            'count' => $row['item_count']     // The count of items in that location
        );
    }
} else {
    echo json_encode(["message" => "No records found."]);
}

// Return the result as JSON
echo json_encode($locations);

// Close connection
$conn->close();
?>
