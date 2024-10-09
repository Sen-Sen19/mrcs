<?php

include 'conn.php'; 


if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$carModel = 'suzuki old'; 
$sql = "SELECT [car_model], [process], [first_total_shots] AS value, 
        [second_total_shots] AS second_value, [third_total_shots] AS third_value 
        FROM [live_mrcs_db].[dbo].[total_shots] 
        WHERE car_model = ? 
        AND process IN (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$processes = [
 
    'trd_nwpa_below_2_0_except_0_13',
    'trd_nwpa_2_0_3_0',
    'trd_wpa_below_2_0_except_0_13',
    'trd_aluminum_nwpa_2_0',
    'tr327',
    'tr328',
   
    'trd_aluminum_nwpa_below_2_0',
    'aluminum_visual_inspection',
    'enlarged_terminal_check_for_alpha',
    'jam_auto_crimping_and_twisting',
    'nsc_9'
];


$params = array_merge([$carModel], $processes);


$stmt = sqlsrv_query($conn, $sql, $params);


if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}


$results = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $results[] = $row;
}


header('Content-Type: application/json');
echo json_encode($results);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
