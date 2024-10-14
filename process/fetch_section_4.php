<?php

include 'conn.php';


$sql = "SELECT car_model, process, machine_inventory, machine_requirements1, machine_requirements2, machine_requirements3, jph1, wt1, ot1, mp1, jph2, wt2, ot2, mp2, jph3, wt3, ot3, mp3, id
        FROM [live_mrcs_db].[dbo].[section_4]";


$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}


$data = array();


while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}


header('Content-Type: application/json'); 
echo json_encode($data);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
