<?php

include 'conn.php';

$sql = "SELECT s.id, 
               s.car_model, 
               s.process, 
               s.machine_inventory, 
               s.machine_requirements1, 
               s.machine_requirements2, 
               s.machine_requirements3, 
               s.jph1, 
               s.wt1, 
               s.ot1, 
               s.mp1, 
               s.jph2, 
               s.wt2, 
               s.ot2, 
               s.mp2, 
               s.jph3, 
               s.wt3, 
               s.ot3, 
               s.mp3
        FROM [live_mrcs_db].[dbo].[section_2] s";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$data = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

$totalShots = array();
foreach ($data as $entry) {
    $carModel = $entry['car_model'];
    $process = $entry['process'];

    $shotsSql = "SELECT first_total_shots, second_total_shots, third_total_shots
                 FROM [live_mrcs_db].[dbo].[total_shots] 
                 WHERE car_model = ? AND process = ?";

    $shotsParams = [$carModel, $process];
    $shotsStmt = sqlsrv_query($conn, $shotsSql, $shotsParams);

    if ($shotsStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($shotsRow = sqlsrv_fetch_array($shotsStmt, SQLSRV_FETCH_ASSOC)) {
        $totalShots[] = array_merge($entry, $shotsRow);
    }

    sqlsrv_free_stmt($shotsStmt);
}

// Sort the totalShots array by car_model
usort($totalShots, function ($a, $b) {
    return strcmp($a['car_model'], $b['car_model']);
});

header('Content-Type: application/json');  
echo json_encode($totalShots);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
