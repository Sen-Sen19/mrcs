<?php
include 'conn.php'; 

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);
$added_by = isset($input['added_by']) ? $input['added_by'] : '';

// Prepare the SQL statement to delete rows where added_by matches
$sql = "DELETE FROM plan_2 WHERE added_by = ?";
$params = array($added_by);
$stmt = sqlsrv_query($conn, $sql, $params);

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
