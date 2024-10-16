<?php
include 'conn.php'; // Use your connection file

$sql = "TRUNCATE TABLE plan_2"; // SQL statement to empty the table

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    $error = print_r(sqlsrv_errors(), true);
    echo json_encode(['success' => false, 'message' => $error]);
    die();
} else {
    echo json_encode(['success' => true]);
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
