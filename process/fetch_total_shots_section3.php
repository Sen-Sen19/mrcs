<?php

include 'conn.php'; 


if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$carModel = 'mazda merge'; 
$sql = "SELECT [car_model], [process], [first_total_shots] AS value, 
        [second_total_shots] AS second_value, [third_total_shots] AS third_value 
        FROM [live_mrcs_db].[dbo].[total_shots] 
        WHERE car_model = ? 
        AND process IN (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$processes = [
    'trd_nwpa_below_2_0_except_0_13',
'trd_nwpa_2_0_3_0',
'trdwpa_below_2_0_except_0_13',
'trd_aluminum_wpa_below_2_0',
'aluminum_visual_inspection',
'enlarged_terminal_check_aluminum',
'twisting_primary_normal_wires_l_less_than_1500mm',
'twisting_primary_normal_wires_l_less_than_3000mm',
'twisting_primary_normal_wires_l_less_than_4500mm',
'twisting_primary_normal_wires_l_less_than_6000mm',
'twisting_primary_normal_wires_l_less_than_7500mm',
'twisting_primary_normal_wires_l_less_than_9000mm',
'twisting_secondary_normal_wires_l_less_than_1500mm',
'twisting_secondary_normal_wires_l_less_than_3000mm',
'twisting_secondary_normal_wires_l_less_than_4500mm',
'twisting_secondary_normal_wires_l_less_than_6000mm',
'twisting_secondary_normal_wires_l_less_than_7500mm',
'twisting_secondary_normal_wires_l_less_than_9000mm',
'twisting_secondary_aluminum_wires_l_less_than_1500mm',
'twisting_secondary_aluminum_wires_l_less_than_3000mm',
'twisting_secondary_aluminum_wires_l_less_than_4500mm',
'twisting_secondary_aluminum_wires_l_less_than_6000mm',
'twisting_secondary_aluminum_wires_l_less_than_7500mm',
'twisting_secondary_aluminum_wires_l_less_than_9000mm',
'twisting_primary_aluminum_wires_l_less_than_1500mm',
'twisting_primary_aluminum_wires_l_less_than_3000mm',
'twisting_primary_aluminum_wires_l_less_than_4500mm',
'twisting_primary_aluminum_wires_l_less_than_6000mm',
'manual_crimping_2tons_normal_single_crimp',
'manual_crimping_2tons_normal_double_crimp',
'manual_crimping_2tons_double_crimp_la_terminal',
'manual_crimping_2tons_w_gomusen',
'anual_crimping_4tons_normal_single_crimp',
'manual_crimping_4tons_normal_double_crimp',
'manual_crimping_4tons_double_crimp_la_terminal',
'manual_crimping_4tons_w_gomusen',
'joint_crimping_2tons_ps_800_s_2',
'joint_crimping_2tons_ps_200_m_2',
'joint_crimping_2tons_ps_017_ss_2',
'joint_crimping_2tons_ps_126_sst2'





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
