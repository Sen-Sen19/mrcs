<?php
include('conn.php');

// Get the page parameter from the request
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 100; // Number of rows to fetch per request
$offset = ($page - 1) * $limit;

// SQL queries for pagination
$sql1 = "SELECT * FROM first_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$sql2 = "SELECT * FROM unique_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$sql3 = "SELECT * FROM non_machine_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$sql4 = "SELECT * FROM secondary_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$sql5 = "SELECT * FROM other_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";

// SQL queries for total record count
$countSql1 = "SELECT COUNT(*) AS total FROM first_process";
$countSql2 = "SELECT COUNT(*) AS total FROM unique_process";
$countSql3 = "SELECT COUNT(*) AS total FROM non_machine_process";
$countSql4 = "SELECT COUNT(*) AS total FROM secondary_process";
$countSql5 = "SELECT COUNT(*) AS total FROM other_process";

$result1 = sqlsrv_query($conn, $sql1);
$result2 = sqlsrv_query($conn, $sql2);
$result3 = sqlsrv_query($conn, $sql3);
$result4 = sqlsrv_query($conn, $sql4);
$result5 = sqlsrv_query($conn, $sql5);

$countResult1 = sqlsrv_query($conn, $countSql1);
$countResult2 = sqlsrv_query($conn, $countSql2);
$countResult3 = sqlsrv_query($conn, $countSql3);
$countResult4 = sqlsrv_query($conn, $countSql4);
$countResult5 = sqlsrv_query($conn, $countSql5);

$data1 = [];
$data2 = [];
$data3 = [];
$data4 = [];
$data5 = [];

$totalRecords = 0;
if ($result1 === false || $result2 === false || $result3 === false || $result4 === false || $result5 === false || 
    $countResult1 === false || $countResult2 === false || $countResult3 === false || $countResult4 === false || $countResult5 === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch data for all queries
while ($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {
    $data1[] = $row;
}
while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
    $data2[] = $row;
}
while ($row = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC)) {
    $data3[] = $row;
}
while ($row = sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC)) {
    $data4[] = $row;
}
while ($row = sqlsrv_fetch_array($result5, SQLSRV_FETCH_ASSOC)) {
    $data5[] = $row;
}

// Total count
$countRow1 = sqlsrv_fetch_array($countResult1, SQLSRV_FETCH_ASSOC);
$countRow2 = sqlsrv_fetch_array($countResult2, SQLSRV_FETCH_ASSOC);
$countRow3 = sqlsrv_fetch_array($countResult3, SQLSRV_FETCH_ASSOC);
$countRow4 = sqlsrv_fetch_array($countResult4, SQLSRV_FETCH_ASSOC);
$countRow5 = sqlsrv_fetch_array($countResult5, SQLSRV_FETCH_ASSOC);
$totalRecords = $countRow1['total'] + $countRow2['total'] ;

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
foreach ($data3 as $row) {
    $key = $row['base_product'] . $row['car_model'] . $row['product'] . $row['car_code'] . $row['block'] . $row['class'] . $row['line_no'] . $row['circuit_qty'];
    if (isset($combinedData[$key])) {
        $combinedData[$key] = array_merge($combinedData[$key], $row);
    } else {
        $combinedData[$key] = $row;
    }
}
foreach ($data4 as $row) {
    $key = $row['base_product'] . $row['car_model'] . $row['product'] . $row['car_code'] . $row['block'] . $row['class'] . $row['line_no'] . $row['circuit_qty'];
    if (isset($combinedData[$key])) {
        $combinedData[$key] = array_merge($combinedData[$key], $row);
    } else {
        $combinedData[$key] = $row;
    }
}
foreach ($data5 as $row) {
    $key = $row['base_product'] . $row['car_model'] . $row['product'] . $row['car_code'] . $row['block'] . $row['class'] . $row['line_no'] . $row['circuit_qty'];
    if (isset($combinedData[$key])) {
        $combinedData[$key] = array_merge($combinedData[$key], $row);
    } else {
        $combinedData[$key] = $row;
    }
}

// Prepare JSON response
$response = [
    'totalRecords' => $totalRecords,
    'data' => array_values($combinedData) // Array values ensure re-indexing
];

header('Content-Type: application/json');
echo json_encode($response);

?>
