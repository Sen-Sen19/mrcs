<?php
// Include your database connection
include 'conn.php'; // Make sure this file has the connection to your MS SQL Server

header('Content-Type: application/json');

try {
    // Query to fetch car model and lack/excess data
    $sql = "SELECT car_model, lack_excess FROM dashboard_tbl"; // Replace with your actual table name
    $stmt = $conn->query($sql);
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the results as a JSON object
    echo json_encode($results);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
