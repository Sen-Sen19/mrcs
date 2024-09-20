<?php
include 'conn.php'; // Include the connection file

$sql = "SELECT COUNT(*) as count FROM plan_from_pc";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
echo $row['count']; // Output the number of rows
?>
