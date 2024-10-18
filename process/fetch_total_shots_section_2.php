<?php

include 'conn.php'; 


if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$carModel = 'toyota'; 
$sql = "SELECT [car_model], [process], [first_total_shots] AS value, 
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
                        ?
                        
                        
                        )";


$processes = [
 
'trd_nwpa_0_13',
'trd_nwpa_below_2_0_except_0_13',
'trd_nwpa_2_0_3_0',
'trd_wpa_below_2_0_except_0_13',
'trd_aluminum_nwpa_2_0',
'trd_aluminum_nwpa_below_2_0',
'trd_aluminum_wpa_below_2_0',
'aluminum_visual_inspection',
'enlarged_terminal_check_aluminum',
'trd_alpha_aluminum_nwpa',
'aluminum_visual_inspection_alpha',
'enlarged_terminal_check_alpha',
'trd_alpha_aluminum_5_0_above',
'qc_inspector',
'zaihai_man',
'sam_18a',
'sam_18b',
'sam_18c',
'sam_26a',
'sam_26b',
'sam_26c',
'sam_26d',
'sam_33a',
'sam_33b',
'sam_32a',
'sam_32b',
'sam_32c',
'sam_34a',
'sam_34b',
'tensile_strength_trd',
'tensile_strength_sam',
'twisting_primary_normal_wires_l1500mm',
'twisting_primary_normal_wires_l3000mm',
'twisting_primary_normal_wires_l4500mm',
'twisting_primary_normal_wires_l6000mm',
'twisting_primary_normal_wires_l7500mm',
'twisting_primary_normal_wires_l9000mm',
'twisting_secondary_normal_wires_l1500mm',
'twisting_secondary_normal_wires_l3000mm',
'twisting_secondary_normal_wires_l4500mm',
'twisting_secondary_normal_wires_l6000mm',
'twisting_secondary_normal_wires_l7500mm',
'twisting_secondary_normal_wires_l9000mm',
'twisting_primary_aluminum_wires_l1500mm',
'twisting_primary_aluminum_wires_l3000mm',
'twisting_primary_aluminum_wires_l4500mm',
'twisting_primary_aluminum_wires_l6000mm',
'twisting_secondary_aluminum_wires_l1500mm',
'twisting_secondary_aluminum_wires_l3000mm',
'twisting_secondary_aluminum_wires_l4500mm',
'twisting_secondary_aluminum_wires_l6000mm',
'twisting_secondary_aluminum_wires_l7500mm',
'twisting_secondary_aluminum_wires_l9000mm',
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
'manual_crimping_5tons',
'airbag',
'intermediate_ripping_uas_manual_nf_f',
'intermediate_stripping_kb10',
'joint_crimping_2tons_ps_017_ss_2',
'joint_crimping_2tons_ps_126_sst2',
'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2',
'servo_press_crimping',
'ultrasonic_welding',
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
'heat_shrink_welding',
'casting_c385_shieldwire',
'quick_stripping_927_auto',
'manual_crimping_shieldwire_2t',
'joint_crimping_2tons_ps_017_ss_2_sw',
'joint_crimping_2tons_ps_126_sst2_sw',
'manual_taping_dispenser_sw',
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
'completion'

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
