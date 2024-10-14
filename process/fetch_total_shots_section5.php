<?php

include 'conn.php'; 

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$carModel1 = 'Honda T20';  
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
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                        ?, ?, ?, ?, ?, ?, ?)";



$processes1 = [
'jam_auto_crimping_and_twisting',
'trd_nwpa_0_13',
'trd_nwpa_below_2.0_except_0_13',
'trd_nwpa_2.0_3.0',
'trd_wpa_2.0_3.0',
'trd_wpa_below_2.0_except_0_13',
'qc_inspector',
'zaihai_man',
'sam_20',
'sam_20a',
'sam_22',
'sam_47',
'sam_38',
'sam_39',
'sam_40',
'sam_37',
'sam_45',
'sam_46',
'sam_35',
'sam_36a',
'sam_36b',
'tensile_strength_trd',
'tensile_strength_sam',
'airbag',
'casting_c385_shieldwire',
'drainwire_tip',
'intermediate_ripping_uas_joint',
'joint_crimping_2tons_ps_017_ss_2',
'joint_crimping_2tons_ps_126_sst2',
'joint_crimping_2tons_ps_200_m_2',
'joint_crimping_2tons_ps_800_s_2',
'joint_crimping_2tons_ps_017_ss_2_sw',
'joint_crimping_2tons_ps_126_sst2_sw',
'joint_taping_12mm_ps_700_l_2_ps_200_m_2',
'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2',
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
'manual_crimping_shieldwire_2t',
'manual_heat_shrink_blower_sumitube',
'quick_stripping_927_auto',
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
'uv_iii_1',
'uv_iii_2',
'uv_iii_4',
'uv_iii_5',
'uv_iii_7',
'uv_iii_8',
'v_type_twisting',
'v_type_twisting_2_v_shape',
'v_type_twisting_2_straight_2_v_shape',
'v_type_twisting_4_v_shape',
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
'tr189',
'tr241',
'tr282',
'aluminum_dimension_check_aluminum_terminal_inspection',
'aluminum_visual_inspection',
'enlarged_terminal_check_aluminum',
'aluminum_coating_uv_ii',
'arc_welding',
'tensile_strength_manual_crimping',
'tensile_strength_joint_crimping',
'tensile_strength_welding',

];


$params1 = array_merge([$carModel1], $processes1);


$stmt1 = sqlsrv_query($conn, $sql1, $params1);

if ($stmt1 === false) {
    die(print_r(sqlsrv_errors(), true));
}


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
