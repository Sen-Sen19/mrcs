<?php
include('conn.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 100;
$offset = ($page - 1) * $limit;


$sql = "SELECT * FROM first_process ORDER BY base_product OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";


$countSql = "SELECT COUNT(*) AS total FROM first_process";


$result = sqlsrv_query($conn, $sql);
$countResult = sqlsrv_query($conn, $countSql);

$data = [];
$totalRecords = 0;

if ($result === false || $countResult === false) {
    die(print_r(sqlsrv_errors(), true));
}


while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}


$countRow = sqlsrv_fetch_array($countResult, SQLSRV_FETCH_ASSOC);
$totalRecords = $countRow['total'];


$response = [
    'totalRecords' => $totalRecords,
    'data' => $data
];


header('Content-Type: application/json');
echo json_encode($response);
?>
