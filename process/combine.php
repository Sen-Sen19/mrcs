<?php

$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    error_log("SQLSRV Connection Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Database connection failed.");
}

$sql = "
    SELECT 
      fp.[base_product], 
        fp.[car_model], 
        fp.[product], 
        fp.[car_code], 
        fp.[block], 
        fp.[class], 
        fp.[line_no], 
        fp.[circuit_qty], 
        fp.[trd_nwpa_0_13], 
        fp.[trd_nwpa_below_2_0_except_0_13], 
        fp.[trd_nwpa_2_0_3_0], 
        fp.[trd_wpa_0_13], 
        fp.[trd_wpa_below_2_0_except_0_13], 
        fp.[trd_wpa_2_0_3_0], 
        fp.[tr327], 
        fp.[tr328], 
        fp.[trd_aluminum_nwpa_2_0], 
        fp.[trd_aluminum_nwpa_below_2_0], 
        fp.[trd_aluminum_wpa_2_0], 
        fp.[trd_aluminum_wpa_below_2_0], 
        fp.[aluminum_dimension_check_aluminum_terminal_inspection], 
        fp.[aluminum_visual_inspection], 
        fp.[aluminum_coating_uv_ii], 
        fp.[aluminum_image_inspection], 
        fp.[aluminum_uv_iii], 
        fp.[trd_alpha_aluminum_nwpa], 
        fp.[trd_alpha_aluminum_wpa], 
        fp.[aluminum_visual_inspection_for_alpha], 
        fp.[enlarged_terminal_check_for_alpha], 
        fp.[air_water_leak_test], 
        fp.[sam_sub_no_airbag], 
        fp.[sam_sub_no_normal], 
        fp.[jam_auto_crimping_and_twisting], 
        fp.[trd_alpha_aluminum_5_0_above], 
        fp.[point_marking_nsc], 
        fp.[point_marking_sam], 
        fp.[enlarged_terminal_check_aluminum], 
        fp.[nsc_1], 
        fp.[nsc_2], 
        fp.[nsc_3], 
        fp.[nsc_4], 
        fp.[nsc_5], 
        fp.[nsc_6], 
        fp.[nsc_7], 
        fp.[nsc_8], 
        fp.[nsc_9], 
        fp.[nsc_10],
        up.[joint_crimping_20tons_ps_115_2_3l_2],
        up.[joint_crimping_20tons_ps_115_2_3l_2],
up.[ultrasonic_welding],
up.[servo_press_crimping],
up.[low_viscosity],
up.[air_water_leak_test2],
up.[heatshrink_low_viscosity],
up.[stmac_shieldwire_j12],
up.[hirose_sheath_stripping_927r],
up.[hirose_unistrip],
up.[hirose_acetate_taping],
up.[hirose_manual_crimping_2_tons],
up.[hirose_copper_taping],
up.[hirose_hgt17ap_crimping],
up.[stmac_aluminum],
up.[manual_crimping_20tons],
up.[dip_soldering_battery],
up.[ultrasonic_dip_soldering_aluminum],
up.[la_molding],
up.[pressure_welding_sun_visor],
up.[pressure_welding_dome_lamp],
up.[casting_c377a],
up.[coaxstrip_6580],
up.[manual_crimping_2t_ferrule],
up.[ferrule_auto_crimping],
up.[enlarge_terminal_inspection],
up.[waterproof_pad_press],
up.[parts_insertion],
up.[braided_wire_folding],
up.[outside_ferrule_insertion],
up.[joint_crimping_2t],
up.[welding_at_head],
up.[welding_taping],
up.[uv_iii_1],
up.[uv_iii_2],
up.[uv_iii_4],
up.[uv_iii_5],
up.[uv_iii_7],
up.[uv_iii_8],
up.[drainwire_tip],
up.[arc_welding],
up.[c373a_yamaha],
up.[cocripper],
up.[quickstripping],
up.[joint_crimping_20tons_ps_115_2_3l_2],
up.[ultrasonic_welding],
up.[servo_press_crimping],
up.[low_viscosity],
up.[air_water_leak_test2],
up.[heatshrink_low_viscosity],
up.[stmac_shieldwire_j12],
up.[hirose_sheath_stripping_927r],
up.[hirose_unistrip],
up.[hirose_acetate_taping],
up.[hirose_manual_crimping_2_tons],
up.[hirose_copper_taping],
up.[hirose_hgt17ap_crimping],
up.[stmac_aluminum],
up.[manual_crimping_20tons],
up.[dip_soldering_battery],
up.[ultrasonic_dip_soldering_aluminum],
up.[la_molding],
up.[pressure_welding_sun_visor],
up.[pressure_welding_dome_lamp],
up.[casting_c377a],
up.[coaxstrip_6580],
up.[manual_crimping_2t_ferrule],
up.[ferrule_auto_crimping],
up.[enlarge_terminal_inspection],
up.[waterproof_pad_press],
up.[parts_insertion],
up.[braided_wire_folding],
up.[outside_ferrule_insertion],
up.[joint_crimping_2t],
up.[welding_at_head],
up.[welding_taping],
up.[uv_iii_1],
up.[uv_iii_2],
up.[uv_iii_4],
up.[uv_iii_5],
up.[uv_iii_7],
up.[uv_iii_8],
up.[drainwire_tip],
up.[arc_welding],
up.[c373a_yamaha],
up.[cocripper],
up.[quickstripping],





np.[airbag_housing],
np.[cap_insertion],
np.[shieldwire_taping],
np.[gomusen_insertion],
np.[point_marking],
np.[looping],
np.[shikakari_handler],
np.[black_taping],
np.[components_insertion],
sp.[joint_crimping_2tons_ps_200_m_2],
sp.[joint_crimping_2tons_ps_017_ss_2],
sp.[joint_crimping_2tons_ps_126_sst2],
sp.[joint_crimping_4tons_ps_700_l_2],
sp.[joint_crimping_5tons_ps_150_ll],
sp.[manual_crimping_shieldwire_2t],
sp.[manual_crimping_shieldwire_4t],
sp.[joint_crimping_2tons_ps_800_s_2_sw],
sp.[joint_crimping_2tons_ps_126_sst2_sw],
sp.[joint_crimping_2tons_ps_017_ss_2_sw],
sp.[twisting_primary_normal_wires_l_less_than_1500mm],
sp.[twisting_primary_normal_wires_l_less_than_3000mm],
sp.[twisting_primary_normal_wires_l_less_than_4500mm],
sp.[twisting_primary_normal_wires_l_less_than_6000mm],
sp.[twisting_primary_normal_wires_l_less_than_7500mm],
sp.[twisting_primary_normal_wires_l_less_than_9000mm],
sp.[twisting_secondary_normal_wires_l_less_than_1500mm],
sp.[twisting_secondary_normal_wires_l_less_than_3000mm],
sp.[twisting_secondary_normal_wires_l_less_than_4500mm],
sp.[twisting_secondary_normal_wires_l_less_than_6000mm],
sp.[twisting_secondary_normal_wires_l_less_than_7500mm],
sp.[twisting_secondary_normal_wires_l_less_than_9000mm],
sp.[twisting_primary_aluminum_wires_l_less_than_1500mm],
sp.[twisting_primary_aluminum_wires_l_less_than_3000mm],
sp.[twisting_primary_aluminum_wires_l_less_than_4500mm],
sp.[twisting_primary_aluminum_wires_l_less_than_6000mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_1500mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_3000mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_4500mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_6000mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_7500mm],
sp.[twisting_secondary_aluminum_wires_l_less_than_9000mm],
sp.[manual_crimping_2tons_normal_single_crimp],
sp.[manual_crimping_2tons_normal_double_crimp],
sp.[manual_crimping_2tons_double_crimp_twisted],
sp.[manual_crimping_2tons_la_terminal],
sp.[manual_crimping_2tons_double_crimp_la_terminal],
sp.[manual_crimping_2tons_w_gomusen],
sp.[manual_crimping_4tons_double_crimp_twisted],
sp.[manual_crimping_4tons_normal_single_crimp],
sp.[manual_crimping_4tons_normal_double_crimp],
sp.[manual_crimping_4tons_la_terminal],
sp.[manual_crimping_4tons_double_crimp_la_terminal],
sp.[manual_crimping_4tons_w_gomusen],
sp.[manual_crimping_5tons],
sp.[intermediate_butt_welding_except_0_13_electrode_1],
sp.[intermediate_butt_welding_except_0_13_electrode_2],
sp.[intermediate_butt_welding_except_0_13_electrode_3],
sp.[intermediate_butt_welding_except_0_13_electrode_4],
sp.[intermediate_butt_welding_except_0_13_electrode_5],
sp.[welding_at_head_except_0_13_electrode_1],
sp.[welding_at_head_except_0_13_electrode_2],
sp.[welding_at_head_except_0_13_electrode_3],
sp.[welding_at_head_except_0_13_electrode_4],
sp.[welding_at_head_except_0_13_electrode_5],
sp.[intermediate_butt_welding_0_13_electrode_1],
sp.[welding_at_head_0_13_electrode_1],
sp.[intermediate_butt_welding_0_13_electrode_2],
sp.[welding_at_head_0_13_electrode_2],

op.[v_type_twisting],
op.[manual_crimping_2tons_to_be_joint_on_sw],
op.[airbag],
op.[a_b_sub_pc],
op.[intermediate_ripping_uas_manual_nf_f],
op.[manual_crimping_4tons_nf_f],
op.[intermediate_ripping_uas_joint],
op.[intermediate_stripping_kb10],
op.[manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22],
op.[joint_taping_11mm_ps_150_ll_2],
op.[joint_taping_12mm_ps_700_l_2_ps_200_m_2],
op.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2],
op.[heat_shrink_joint_crimping],
op.[heat_shrink_la_terminal],
op.[manual_crimping_2tons_nsc_weld],
op.[intermediate_stripping_kb10_nsc_weld],
op.[joint_crimping_2tons_ps_017_ss_2_nsc_weld],
op.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld],
op.[silicon_injection],
op.[welding_taping_13mm],
op.[heat_shrink_welding],
op.[casting_c385_shieldwire],
op.[quick_stripping_927_auto],
op.[mira_quick_stripping],
op.[quick_stripping_311_manual],
op.[manual_heat_shrink_blower_sumitube],
op.[manual_taping_dispenser_sw],
op.[heat_shrink_joint_crimping_sw],
op.[casting_c373],
op.[casting_c377],
op.[casting_c371],
op.[manual_heat_shrink_blower_battery],
op.[casting_c373_normal],
op.[casting_c371_normal],
op.[manual_2tons_bending],
op.[manual_5tons_battery],
op.[al_looping],
op.[soldering],
op.[waterproof_agent_injection],
op.[thermosetting],
op.[completion],
op.[picking_looping],
op.[welding_end],
op.[intermediate_welding],
op.[sam_set_a_b],
op.[sam_set_normal],
op.[total_circuit],
op.[new_airbag]


        
    FROM [live_mrcs_db].[dbo].[first_process] AS fp
    LEFT JOIN [live_mrcs_db].[dbo].[unique_process] AS up
        ON fp.[base_product] = up.[base_product]
        AND fp.[car_model] = up.[car_model]
        AND fp.[product] = up.[product]
        AND fp.[car_code] = up.[car_code]
    LEFT JOIN [live_mrcs_db].[dbo].[non_machine_process] AS np
        ON fp.[base_product] = np.[base_product]
        AND fp.[car_model] = np.[car_model]
        AND fp.[product] = np.[product]
        AND fp.[car_code] = np.[car_code]
    LEFT JOIN [live_mrcs_db].[dbo].[secondary_process] AS sp
        ON fp.[base_product] = sp.[base_product]
        AND fp.[car_model] = sp.[car_model]
        AND fp.[product] = sp.[product]
        AND fp.[car_code] = sp.[car_code]
    
    LEFT JOIN [live_mrcs_db].[dbo].[other_process] AS op
        ON fp.[base_product] = op.[base_product]
        AND fp.[car_model] = op.[car_model]
        AND fp.[product] = op.[product]
        AND fp.[car_code] = op.[car_code]
";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    error_log("SQLSRV Query Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Query execution failed.");
}

$data = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

sqlsrv_close($conn);

header('Content-Type: application/json');
echo json_encode($data);
?>
