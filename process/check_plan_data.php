<?php
include 'conn.php'; // Use your connection file

// Get the full name from the session
$full_name = isset($_SESSION['full_name']) ? htmlspecialchars($_SESSION['full_name']) : '';

// Prepare the SQL statement to count records matching the added_by column
$sql = "SELECT COUNT(*) AS count FROM plan_2 WHERE added_by = ?";

// Prepare the statement
$params = array($full_name);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    $error = print_r(sqlsrv_errors(), true);
    echo json_encode(['success' => false, 'message' => $error]);
    die();
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$isEmpty = $row['count'] == 0; // true if no records found, false if found

echo json_encode(['isEmpty' => $isEmpty]);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
