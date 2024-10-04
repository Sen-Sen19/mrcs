<?php
include 'conn.php'; // Include your database connection

// SQL query to count records in plan_from_pc table
$query = "SELECT COUNT(*) as count FROM plan_from_pc";
$result = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

if ($row) {
    echo json_encode(['status' => 'success', 'count' => $row['count']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error fetching data']);
}
?>
