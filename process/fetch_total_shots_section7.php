<?php

include 'conn.php'; 

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$carModel1 = 'Honda Old';  
$sql1 = "SELECT [car_model], [process], [first_total_shots] AS value, 
        [second_total_shots] AS second_value, [third_total_shots] AS third_value 
        FROM [live_mrcs_db].[dbo].[total_shots] 
        WHERE car_model = ? 
        AND process IN (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                        ?, ?, ?)";


$processes1 = [
'trd_nwpa_0_13',
'trd_nwpa_below_2_0_except_0_13',
'trd_nwpa_2_0_3_0',
'trd_wpa_below_2_0_except_0_13',
'qc_inspector',
'zaihai_man',
'sam_14',
'sam_49',
'sam_56',
'tensile_strength_trd',
'tensile_strength_sam',
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
'twisting_primary_aluminum_wires_l_less_than_1500mm',
'twisting_primary_aluminum_wires_l_less_than_3000mm',
'twisting_primary_aluminum_wires_l_less_than_4500mm',
'twisting_primary_aluminum_wires_l_less_than_6000mm',
'twisting_secondary_aluminum_wires_l_less_than_1500mm',
'twisting_secondary_aluminum_wires_l_less_than_3000mm',
'twisting_secondary_aluminum_wires_l_less_than_4500mm',
'twisting_secondary_aluminum_wires_l_less_than_6000mm',
'twisting_secondary_aluminum_wires_l_less_than_7500mm',
'twisting_secondary_aluminum_wires_l_less_than_9000mm',
'v_type_twisting',
'v_type_twisting_4_straight',
'v_type_twisting_2_straight_5_v_shape',
'manual_crimping_2tons_normal_single_crimp',
'manual_crimping_2tons_normal_double_crimp',
'manual_crimping_2tons_double_crimp_twisted',
'manual_crimping_2tons_la_terminal',
'manual_crimping_2tons_double_crimp_la_terminal',
'manual_crimping_2tons_w_gomusen',
'manual_crimping_4tons_normal_single_crimp',
'manual_crimping_4tons_normal_double_crimp',
'manual_crimping_4tons_double_crimp_twisted',
'manual_crimping_4tons_la_terminal',
'manual_crimping_4tons_double_crimp_la_terminal',
'manual_crimping_4tons_w_gomusen',
'airbag',
'intermediate_ripping_uas_joint',
'intermediate_stripping_kb10',
'joint_crimping_2tons_ps_800_s_2',
'joint_crimping_2tons_ps_200_m_2',
'joint_crimping_2tons_ps_017_ss_2',
'joint_crimping_2tons_ps_126_sst2',
'joint_crimping_4tons_ps_700_l_2',
'joint_taping_12mm_ps_700_l_2_ps_200_m_2',
'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2',
'intermediate_butt_welding_except_0_13_electrode_1',
'intermediate_butt_welding_except_0_13_electrode_2',
'intermediate_butt_welding_except_0_13_electrode_3',
'intermediate_butt_welding_except_0_13_electrode_4',
'intermediate_butt_welding_except_0_13_electrode_5',
'welding_at_head_except_0_13_electrode_1',
'welding_at_head_except_0_13_electrode_2',
'welding_at_head_except_0_13_electrode_3',
'welding_at_head_except_0_13_electrode_4',
'welding_at_head_except_0_13_electrode_5',
'intermediate_butt_welding_0_13_electrode_1',
'welding_at_head_0_13_electrode_1',
'intermediate_butt_welding_0_13_electrode_2',
'welding_at_head_0_13_electrode_2',
'silicon_injection',
'welding_taping_13mm',
'casting_c385_shieldwire',
'quick_stripping_927_auto',
'drainwire_tip',
'manual_heat_shrink_blower_sumitube',
'manual_crimping_shieldwire_2t',
'tensile_strength_manual_crimping',
'tensile_strength_joint_crimping',
'tensile_strength_welding',
'braided_wire_folding',
'cap_insertion',
'components_insertion',
'gomusen_insertion',
'looping',
'point_marking',
'airbag_housing',
'shieldwire_taping',
'shikakari_handler',
'black_taping',
'completion',


];

// Prepare parameters for the first query
$params1 = array_merge([$carModel1], $processes1);

// Execute the first query
$stmt1 = sqlsrv_query($conn, $sql1, $params1);

if ($stmt1 === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch results for the first car model
$results1 = array();
while ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
    $results1[] = $row;
}




$combinedResults = array_merge($results1);


header('Content-Type: application/json');
echo json_encode($combinedResults);


sqlsrv_free_stmt($stmt1);

sqlsrv_close($conn);
?>
