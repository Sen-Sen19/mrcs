<?php
include('conn.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 100;
$offset = ($page - 1) * $limit;

// SQL query for first_process
$sql = "SELECT * FROM first_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

// Count total records for first_process
$countSql = "SELECT COUNT(*) AS total FROM first_process";

// Execute the queries
$result = sqlsrv_query($conn, $sql);
$countResult = sqlsrv_query($conn, $countSql);

$data = [];
$totalRecords = 0;

// Check for errors
if ($result === false || $countResult === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch data from the result
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

// Fetch total record count
$countRow = sqlsrv_fetch_array($countResult, SQLSRV_FETCH_ASSOC);
$totalRecords = $countRow['total'];

// Prepare response
$response = [
    'totalRecords' => $totalRecords,
    'data' => $data
];

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
