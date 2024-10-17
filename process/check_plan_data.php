<?php
include 'conn.php'; // Use your connection file

$sql = "SELECT COUNT(*) AS count FROM plan_2"; // SQL statement to count records
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    $error = print_r(sqlsrv_errors(), true);
    echo json_encode(['success' => false, 'message' => $error]);
    die();
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$isEmpty = $row['count'] == 0; // true if empty, false if not

echo json_encode(['isEmpty' => $isEmpty]);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
