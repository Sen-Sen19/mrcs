<?php
include 'conn.php'; 

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);
$added_by = isset($input['added_by']) ? $input['added_by'] : '';

// Prepare the SQL statement to delete rows from total_shots where added_by matches
$sql_delete_total_shots = "DELETE FROM total_shots WHERE added_by = ?";
$params_delete_total_shots = array($added_by);
$stmt_delete_total_shots = sqlsrv_query($conn, $sql_delete_total_shots, $params_delete_total_shots);

if ($stmt_delete_total_shots === false) {
    $error = print_r(sqlsrv_errors(), true);
    echo json_encode(['success' => false, 'message' => $error]);
    die();
}

// Prepare the SQL statement to delete rows from plan_2 where added_by matches
$sql_delete_plan = "DELETE FROM plan_2 WHERE added_by = ?";
$params_delete_plan = array($added_by);
$stmt_delete_plan = sqlsrv_query($conn, $sql_delete_plan, $params_delete_plan);

if ($stmt_delete_plan === false) {
    $error = print_r(sqlsrv_errors(), true);
    echo json_encode(['success' => false, 'message' => $error]);
    die();
} else {
    echo json_encode(['success' => true]);
}

// Free statements and close the connection
sqlsrv_free_stmt($stmt_delete_total_shots);
sqlsrv_free_stmt($stmt_delete_plan);
sqlsrv_close($conn);
?>
