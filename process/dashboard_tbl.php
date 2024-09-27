<?php
include 'conn.php'; // Include your connection script

header('Content-Type: application/json');

// Updated SQL query to include the `jph` field
$query = "SELECT car_model, machine_inventory, total_shot, ot, lack_excess, machine_requirements, jph FROM dashboard_tbl";
$stmt = sqlsrv_query($conn, $query);

$data = array();

if ($stmt === false) {
    $error = sqlsrv_errors();
    echo json_encode(array('error' => $error));
    exit; 
}

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
