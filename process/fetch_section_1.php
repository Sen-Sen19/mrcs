<?php

include 'conn.php';

// Retrieve the full_name from the request
$fullName = $_GET['full_name'] ?? ''; // Get the full_name from query parameters

$sql = "SELECT s.id, 
               s.car_model, 
               s.process,
               s.process_name,
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
               s.mp3,
               s.added_by
        FROM [live_mrcs_db].[dbo].[section_1] s
        WHERE s.added_by = ?"; 

$params = [$fullName];
$stmt = sqlsrv_query($conn, $sql, $params);

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


    $first_total_shots = 0;
    $second_total_shots = 0;
    $third_total_shots = 0;


    if ($shotsRow = sqlsrv_fetch_array($shotsStmt, SQLSRV_FETCH_ASSOC)) {
        $first_total_shots = $shotsRow['first_total_shots'];
        $second_total_shots = $shotsRow['second_total_shots'];
        $third_total_shots = $shotsRow['third_total_shots'];
    }


    $totalShots[] = array_merge($entry, [
        'first_total_shots' => $first_total_shots,
        'second_total_shots' => $second_total_shots,
        'third_total_shots' => $third_total_shots,
    ]);

    sqlsrv_free_stmt($shotsStmt);
}


usort($totalShots, function ($a, $b) {
    return $a['id'] <=> $b['id'];
});

header('Content-Type: application/json');  
echo json_encode($totalShots);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
