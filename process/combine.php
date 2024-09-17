<?php
include('conn.php');

// Get the page parameter from the request
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 100; // Number of rows to fetch per request
$offset = ($page - 1) * $limit;

// SQL queries for pagination
$sql1 = "SELECT * FROM first_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$sql2 = "SELECT * FROM unique_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

// SQL queries for total record count
$countSql1 = "SELECT COUNT(*) AS total FROM first_process";
$countSql2 = "SELECT COUNT(*) AS total FROM unique_process";

$result1 = sqlsrv_query($conn, $sql1);
$result2 = sqlsrv_query($conn, $sql2);
$countResult1 = sqlsrv_query($conn, $countSql1);
$countResult2 = sqlsrv_query($conn, $countSql2);

$data1 = [];
$data2 = [];
$totalRecords = 0;

if ($result1 === false || $result2 === false || $countResult1 === false || $countResult2 === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {
    $data1[] = $row;
}

while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
    $data2[] = $row;
}

// Total count
$countRow1 = sqlsrv_fetch_array($countResult1, SQLSRV_FETCH_ASSOC);
$countRow2 = sqlsrv_fetch_array($countResult2, SQLSRV_FETCH_ASSOC);
$totalRecords = $countRow1['total'] + $countRow2['total'];

$combinedData = [];
foreach ($data1 as $row) {
    $key = $row['base_product'] . $row['car_model'] . $row['product'] . $row['car_code'] . $row['block'] . $row['class'] . $row['line_no'] . $row['circuit_qty'];
    $combinedData[$key] = $row;
}

foreach ($data2 as $row) {
    $key = $row['base_product'] . $row['car_model'] . $row['product'] . $row['car_code'] . $row['block'] . $row['class'] . $row['line_no'] . $row['circuit_qty'];
    if (isset($combinedData[$key])) {
        $combinedData[$key] = array_merge($combinedData[$key], $row);
    } else {
        $combinedData[$key] = $row;
    }
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode([
    'data' => array_values($combinedData),
    'totalRecords' => $totalRecords
]);
?>
