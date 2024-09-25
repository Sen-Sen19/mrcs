<?php
// Include the database connection
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_masterlist') {

    // SQL Query
    $sql = "
    CREATE TABLE #MaxPlans (
    base_product VARCHAR(255),
    max_plan INT
);

-- Insert data into the temporary table
INSERT INTO #MaxPlans (base_product, max_plan)
SELECT 
    base_product, 
    MAX(max_plan) AS max_plan
FROM 
    plan_from_pc
GROUP BY 
    base_product;
UPDATE fp
SET 
    fp.trd_nwpa_0_13 = fp.trd_nwpa_0_13 * mp.max_plan,
    fp.trd_nwpa_below_2_0_except_0_13 = fp.trd_nwpa_below_2_0_except_0_13 * mp.max_plan,
    fp.trd_nwpa_2_0_3_0 = fp.trd_nwpa_2_0_3_0 * mp.max_plan,
    fp.trd_wpa_0_13 = fp.trd_wpa_0_13 * mp.max_plan,
    fp.trd_wpa_below_2_0_except_0_13 = fp.trd_wpa_below_2_0_except_0_13 * mp.max_plan,
    fp.trd_wpa_2_0_3_0 = fp.trd_wpa_2_0_3_0 * mp.max_plan,
    fp.tr327 = fp.tr327 * mp.max_plan,
    fp.tr328 = fp.tr328 * mp.max_plan,
    fp.trd_aluminum_nwpa_2_0 = fp.trd_aluminum_nwpa_2_0 * mp.max_plan,
    fp.trd_aluminum_nwpa_below_2_0 = fp.trd_aluminum_nwpa_below_2_0 * mp.max_plan,
    fp.trd_aluminum_wpa_2_0 = fp.trd_aluminum_wpa_2_0 * mp.max_plan,
    fp.trd_aluminum_wpa_below_2_0 = fp.trd_aluminum_wpa_below_2_0 * mp.max_plan,
    fp.aluminum_dimension_check_aluminum_terminal_inspection = fp.aluminum_dimension_check_aluminum_terminal_inspection * mp.max_plan,
    fp.aluminum_visual_inspection = fp.aluminum_visual_inspection * mp.max_plan,
    fp.aluminum_coating_uv_ii = fp.aluminum_coating_uv_ii * mp.max_plan,
    fp.aluminum_image_inspection = fp.aluminum_image_inspection * mp.max_plan,
    fp.aluminum_uv_iii = fp.aluminum_uv_iii * mp.max_plan,
    fp.trd_alpha_aluminum_nwpa = fp.trd_alpha_aluminum_nwpa * mp.max_plan,
    fp.trd_alpha_aluminum_wpa = fp.trd_alpha_aluminum_wpa * mp.max_plan,
    fp.aluminum_visual_inspection_for_alpha = fp.aluminum_visual_inspection_for_alpha * mp.max_plan,
    fp.enlarged_terminal_check_for_alpha = fp.enlarged_terminal_check_for_alpha * mp.max_plan,
    fp.air_water_leak_test = fp.air_water_leak_test * mp.max_plan,
    fp.sam_sub_no_airbag = fp.sam_sub_no_airbag * mp.max_plan,
    fp.sam_sub_no_normal = fp.sam_sub_no_normal * mp.max_plan,
    fp.jam_auto_crimping_and_twisting = fp.jam_auto_crimping_and_twisting * mp.max_plan,
    fp.trd_alpha_aluminum_5_0_above = fp.trd_alpha_aluminum_5_0_above * mp.max_plan,
    fp.point_marking_nsc = fp.point_marking_nsc * mp.max_plan,
    fp.point_marking_sam = fp.point_marking_sam * mp.max_plan,
    fp.enlarged_terminal_check_aluminum = fp.enlarged_terminal_check_aluminum * mp.max_plan,
    fp.nsc_1 = fp.nsc_1 * mp.max_plan,
    fp.nsc_2 = fp.nsc_2 * mp.max_plan,
    fp.nsc_3 = fp.nsc_3 * mp.max_plan,
    fp.nsc_4 = fp.nsc_4 * mp.max_plan,
    fp.nsc_5 = fp.nsc_5 * mp.max_plan,
    fp.nsc_6 = fp.nsc_6 * mp.max_plan,
    fp.nsc_7 = fp.nsc_7 * mp.max_plan,
    fp.nsc_8 = fp.nsc_8 * mp.max_plan,
    fp.nsc_9 = fp.nsc_9 * mp.max_plan,
    fp.nsc_10 = fp.nsc_10 * mp.max_plan
FROM 
    live_mrcs_db.dbo.first_process fp
JOIN (
    SELECT 
        base_product, 
        MAX(max_plan) AS max_plan
    FROM 
        plan_from_pc
    GROUP BY 
        base_product
) mp ON fp.base_product = mp.base_product;

-- Update the unique_process table
UPDATE up
SET 
    up.joint_crimping_20tons_ps_115_2_3l_2 = up.joint_crimping_20tons_ps_115_2_3l_2 * mp.max_plan,
    up.ultrasonic_welding = up.ultrasonic_welding * mp.max_plan,
    up.servo_press_crimping = up.servo_press_crimping * mp.max_plan,
    up.low_viscosity = up.low_viscosity * mp.max_plan,
    up.air_water_leak_test2 = up.air_water_leak_test2 * mp.max_plan,
    up.heatshrink_low_viscosity = up.heatshrink_low_viscosity * mp.max_plan,
    up.stmac_shieldwire_j12 = up.stmac_shieldwire_j12 * mp.max_plan,
    up.hirose_sheath_stripping_927r = up.hirose_sheath_stripping_927r * mp.max_plan,
    up.hirose_unistrip = up.hirose_unistrip * mp.max_plan,
    up.hirose_acetate_taping = up.hirose_acetate_taping * mp.max_plan,
    up.hirose_manual_crimping_2_tons = up.hirose_manual_crimping_2_tons * mp.max_plan,
    up.hirose_copper_taping = up.hirose_copper_taping * mp.max_plan,
    up.hirose_hgt17ap_crimping = up.hirose_hgt17ap_crimping * mp.max_plan,
    up.stmac_aluminum = up.stmac_aluminum * mp.max_plan,
    up.manual_crimping_20tons = up.manual_crimping_20tons * mp.max_plan,
    up.dip_soldering_battery = up.dip_soldering_battery * mp.max_plan,
    up.ultrasonic_dip_soldering_aluminum = up.ultrasonic_dip_soldering_aluminum * mp.max_plan,
    up.la_molding = up.la_molding * mp.max_plan,
    up.pressure_welding_sun_visor = up.pressure_welding_sun_visor * mp.max_plan,
    up.pressure_welding_dome_lamp = up.pressure_welding_dome_lamp * mp.max_plan,
    up.casting_c377a = up.casting_c377a * mp.max_plan,
    up.coaxstrip_6580 = up.coaxstrip_6580 * mp.max_plan,
    up.manual_crimping_2t_ferrule = up.manual_crimping_2t_ferrule * mp.max_plan,
    up.ferrule_auto_crimping = up.ferrule_auto_crimping * mp.max_plan,
    up.enlarge_terminal_inspection = up.enlarge_terminal_inspection * mp.max_plan,
    up.waterproof_pad_press = up.waterproof_pad_press * mp.max_plan,
    up.parts_insertion = up.parts_insertion * mp.max_plan,
    up.braided_wire_folding = up.braided_wire_folding * mp.max_plan,
    up.outside_ferrule_insertion = up.outside_ferrule_insertion * mp.max_plan,
    up.joint_crimping_2t = up.joint_crimping_2t * mp.max_plan,
    up.welding_at_head = up.welding_at_head * mp.max_plan,
    up.welding_taping = up.welding_taping * mp.max_plan,
    up.uv_iii_1 = up.uv_iii_1 * mp.max_plan,
    up.uv_iii_2 = up.uv_iii_2 * mp.max_plan,
    up.uv_iii_4 = up.uv_iii_4 * mp.max_plan,
    up.uv_iii_5 = up.uv_iii_5 * mp.max_plan,
    up.uv_iii_7 = up.uv_iii_7 * mp.max_plan,
    up.uv_iii_8 = up.uv_iii_8 * mp.max_plan,
    up.drainwire_tip = up.drainwire_tip * mp.max_plan,
     up.arc_welding = up.arc_welding * mp.max_plan,
    up.c373a_yamaha = up.c373a_yamaha * mp.max_plan,
    up.cocripper = up.cocripper * mp.max_plan,
    up.quickstripping = up.quickstripping * mp.max_plan
FROM 
    live_mrcs_db.dbo.unique_process up
JOIN (
    SELECT 
        base_product, 
        MAX(max_plan) AS max_plan
    FROM 
        plan_from_pc
    GROUP BY 
        base_product
) mp ON up.base_product = mp.base_product;


-- Update the unique_process table
UPDATE np
SET 
np.airbag_housing = airbag_housing * mp.max_plan,
np.cap_insertion = cap_insertion * mp.max_plan,
np.shieldwire_taping = shieldwire_taping * mp.max_plan,
np.gomusen_insertion = gomusen_insertion * mp.max_plan,
np.point_marking = point_marking * mp.max_plan,
np.looping = looping * mp.max_plan,
np.shikakari_handler = shikakari_handler * mp.max_plan,
np.black_taping = black_taping * mp.max_plan,
np.components_insertion = components_insertion * mp.max_plan
FROM 
    live_mrcs_db.dbo.non_machine_process np
JOIN (
    SELECT 
        base_product, 
        MAX(max_plan) AS max_plan
    FROM 
        plan_from_pc
    GROUP BY 
        base_product
) mp ON np.base_product = mp.base_product;



UPDATE sp
SET 
sp.joint_crimping_2tons_ps_800_s_2 = joint_crimping_2tons_ps_800_s_2 * mp.max_plan,
sp.joint_crimping_2tons_ps_200_m_2 = joint_crimping_2tons_ps_200_m_2 * mp.max_plan,
sp.joint_crimping_2tons_ps_017_ss_2 = joint_crimping_2tons_ps_017_ss_2 * mp.max_plan,
sp.joint_crimping_2tons_ps_126_sst2 = joint_crimping_2tons_ps_126_sst2 * mp.max_plan,
sp.joint_crimping_4tons_ps_700_l_2 = joint_crimping_4tons_ps_700_l_2 * mp.max_plan, sp.joint_crimping_5tons_ps_150_ll = joint_crimping_5tons_ps_150_ll * mp.max_plan,
sp.manual_crimping_shieldwire_2t = manual_crimping_shieldwire_2t * mp.max_plan,
sp.manual_crimping_shieldwire_4t = manual_crimping_shieldwire_4t * mp.max_plan,
sp.joint_crimping_2tons_ps_800_s_2_sw = joint_crimping_2tons_ps_800_s_2_sw * mp.max_plan,
sp.joint_crimping_2tons_ps_126_sst2_sw = joint_crimping_2tons_ps_126_sst2_sw * mp.max_plan,
sp.joint_crimping_2tons_ps_017_ss_2_sw = joint_crimping_2tons_ps_017_ss_2_sw * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_1500mm = twisting_primary_normal_wires_l_less_than_1500mm * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_3000mm = twisting_primary_normal_wires_l_less_than_3000mm * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_4500mm = twisting_primary_normal_wires_l_less_than_4500mm * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_6000mm = twisting_primary_normal_wires_l_less_than_6000mm * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_7500mm = twisting_primary_normal_wires_l_less_than_7500mm * mp.max_plan,
sp.twisting_primary_normal_wires_l_less_than_9000mm = twisting_primary_normal_wires_l_less_than_9000mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_1500mm = twisting_secondary_normal_wires_l_less_than_1500mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_3000mm = twisting_secondary_normal_wires_l_less_than_3000mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_4500mm = twisting_secondary_normal_wires_l_less_than_4500mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_6000mm = twisting_secondary_normal_wires_l_less_than_6000mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_7500mm = twisting_secondary_normal_wires_l_less_than_7500mm * mp.max_plan,
sp.twisting_secondary_normal_wires_l_less_than_9000mm = twisting_secondary_normal_wires_l_less_than_9000mm * mp.max_plan,
sp.twisting_primary_aluminum_wires_l_less_than_1500mm = twisting_primary_aluminum_wires_l_less_than_1500mm * mp.max_plan,
sp.twisting_primary_aluminum_wires_l_less_than_3000mm = twisting_primary_aluminum_wires_l_less_than_3000mm * mp.max_plan,
sp.twisting_primary_aluminum_wires_l_less_than_4500mm = twisting_primary_aluminum_wires_l_less_than_4500mm * mp.max_plan,
sp.twisting_primary_aluminum_wires_l_less_than_6000mm = twisting_primary_aluminum_wires_l_less_than_6000mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_1500mm = twisting_secondary_aluminum_wires_l_less_than_1500mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_3000mm = twisting_secondary_aluminum_wires_l_less_than_3000mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_4500mm = twisting_secondary_aluminum_wires_l_less_than_4500mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_6000mm = twisting_secondary_aluminum_wires_l_less_than_6000mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_7500mm = twisting_secondary_aluminum_wires_l_less_than_7500mm * mp.max_plan,
sp.twisting_secondary_aluminum_wires_l_less_than_9000mm = twisting_secondary_aluminum_wires_l_less_than_9000mm * mp.max_plan,
sp.manual_crimping_2tons_normal_single_crimp = manual_crimping_2tons_normal_single_crimp * mp.max_plan,
sp.manual_crimping_2tons_normal_double_crimp = manual_crimping_2tons_normal_double_crimp * mp.max_plan,
sp.manual_crimping_2tons_double_crimp_twisted = manual_crimping_2tons_double_crimp_twisted * mp.max_plan,
sp.manual_crimping_2tons_la_terminal = manual_crimping_2tons_la_terminal * mp.max_plan,
sp.manual_crimping_2tons_double_crimp_la_terminal = manual_crimping_2tons_double_crimp_la_terminal * mp.max_plan,
sp.manual_crimping_2tons_w_gomusen = manual_crimping_2tons_w_gomusen * mp.max_plan,
sp.manual_crimping_4tons_double_crimp_twisted = manual_crimping_4tons_double_crimp_twisted * mp.max_plan,
sp.manual_crimping_4tons_normal_single_crimp = manual_crimping_4tons_normal_single_crimp * mp.max_plan,
sp.manual_crimping_4tons_normal_double_crimp = manual_crimping_4tons_normal_double_crimp * mp.max_plan,
sp.manual_crimping_4tons_la_terminal = manual_crimping_4tons_la_terminal * mp.max_plan,
sp.manual_crimping_4tons_double_crimp_la_terminal = manual_crimping_4tons_double_crimp_la_terminal * mp.max_plan,
sp.manual_crimping_4tons_w_gomusen = manual_crimping_4tons_w_gomusen * mp.max_plan,
sp.manual_crimping_5tons = manual_crimping_5tons * mp.max_plan,
sp.intermediate_butt_welding_except_0_13_electrode_1 = intermediate_butt_welding_except_0_13_electrode_1 * mp.max_plan,
sp.intermediate_butt_welding_except_0_13_electrode_2 = intermediate_butt_welding_except_0_13_electrode_2 * mp.max_plan,
sp.intermediate_butt_welding_except_0_13_electrode_3 = intermediate_butt_welding_except_0_13_electrode_3 * mp.max_plan,
sp.intermediate_butt_welding_except_0_13_electrode_4 = intermediate_butt_welding_except_0_13_electrode_4 * mp.max_plan,
sp.intermediate_butt_welding_except_0_13_electrode_5 = intermediate_butt_welding_except_0_13_electrode_5 * mp.max_plan,
sp.welding_at_head_except_0_13_electrode_1 = welding_at_head_except_0_13_electrode_1 * mp.max_plan,
sp.welding_at_head_except_0_13_electrode_2 = welding_at_head_except_0_13_electrode_2 * mp.max_plan,
sp.welding_at_head_except_0_13_electrode_3 = welding_at_head_except_0_13_electrode_3 * mp.max_plan,
sp.welding_at_head_except_0_13_electrode_4 = welding_at_head_except_0_13_electrode_4 * mp.max_plan,
sp.welding_at_head_except_0_13_electrode_5 = welding_at_head_except_0_13_electrode_5 * mp.max_plan,
sp.intermediate_butt_welding_0_13_electrode_1 = intermediate_butt_welding_0_13_electrode_1 * mp.max_plan,
sp.welding_at_head_0_13_electrode_1 = welding_at_head_0_13_electrode_1 * mp.max_plan,
sp.intermediate_butt_welding_0_13_electrode_2 = intermediate_butt_welding_0_13_electrode_2 * mp.max_plan,
sp.welding_at_head_0_13_electrode_2 = welding_at_head_0_13_electrode_2 * mp.max_plan


FROM 
    live_mrcs_db.dbo.secondary_process sp
JOIN (
    SELECT 
        base_product, 
        MAX(max_plan) AS max_plan
    FROM 
        plan_from_pc
    GROUP BY 
        base_product
) mp ON sp.base_product = mp.base_product;




UPDATE op
SET 

op.v_type_twisting = v_type_twisting * mp.max_plan,
op.manual_crimping_2tons_to_be_joint_on_sw = manual_crimping_2tons_to_be_joint_on_sw * mp.max_plan,
op.airbag = airbag * mp.max_plan,
op.a_b_sub_pc = a_b_sub_pc * mp.max_plan,
op.intermediate_ripping_uas_manual_nf_f = intermediate_ripping_uas_manual_nf_f * mp.max_plan,
op.manual_crimping_4tons_nf_f = manual_crimping_4tons_nf_f * mp.max_plan,
op.intermediate_ripping_uas_joint = intermediate_ripping_uas_joint * mp.max_plan,
op.intermediate_stripping_kb10 = intermediate_stripping_kb10 * mp.max_plan,
op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 = manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * mp.max_plan,
op.joint_taping_11mm_ps_150_ll_2 = joint_taping_11mm_ps_150_ll_2 * mp.max_plan,
op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 = joint_taping_12mm_ps_700_l_2_ps_200_m_2 * mp.max_plan,
op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 = joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * mp.max_plan,
op.heat_shrink_joint_crimping = heat_shrink_joint_crimping * mp.max_plan,
op.heat_shrink_la_terminal = heat_shrink_la_terminal * mp.max_plan,
op.manual_crimping_2tons_nsc_weld = manual_crimping_2tons_nsc_weld * mp.max_plan,
op.intermediate_stripping_kb10_nsc_weld = intermediate_stripping_kb10_nsc_weld * mp.max_plan,
op.joint_crimping_2tons_ps_017_ss_2_nsc_weld = joint_crimping_2tons_ps_017_ss_2_nsc_weld * mp.max_plan,
op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld = joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * mp.max_plan,
op.silicon_injection = silicon_injection * mp.max_plan,
op.welding_taping_13mm = welding_taping_13mm * mp.max_plan,
op.heat_shrink_welding = heat_shrink_welding * mp.max_plan,
op.casting_c385_shieldwire = casting_c385_shieldwire * mp.max_plan,
op.quick_stripping_927_auto = quick_stripping_927_auto * mp.max_plan,
op.mira_quick_stripping = mira_quick_stripping * mp.max_plan,
op.quick_stripping_311_manual = quick_stripping_311_manual * mp.max_plan,
op.manual_heat_shrink_blower_sumitube = manual_heat_shrink_blower_sumitube * mp.max_plan,
op.manual_taping_dispenser_sw = manual_taping_dispenser_sw * mp.max_plan,
op.heat_shrink_joint_crimping_sw = heat_shrink_joint_crimping_sw * mp.max_plan,
op.casting_c373 = casting_c373 * mp.max_plan,
op.casting_c377 = casting_c377 * mp.max_plan,
op.casting_c371 = casting_c371 * mp.max_plan,
op.manual_heat_shrink_blower_battery = manual_heat_shrink_blower_battery * mp.max_plan,
op.casting_c373_normal = casting_c373_normal * mp.max_plan,
op.casting_c371_normal = casting_c371_normal * mp.max_plan,
op.manual_2tons_bending = manual_2tons_bending * mp.max_plan,
op.manual_5tons_battery = manual_5tons_battery * mp.max_plan,
op.al_looping = al_looping * mp.max_plan,
op.soldering = soldering * mp.max_plan,
op.waterproof_agent_injection = waterproof_agent_injection * mp.max_plan,
op.thermosetting = thermosetting * mp.max_plan,
op.completion = completion * mp.max_plan,
op.picking_looping = picking_looping * mp.max_plan,
op.welding_end = welding_end * mp.max_plan,
op.intermediate_welding = intermediate_welding * mp.max_plan,
op.sam_set_a_b = sam_set_a_b * mp.max_plan,
op.sam_set_normal = sam_set_normal * mp.max_plan,
op.total_circuit = total_circuit * mp.max_plan,
op.new_airbag = new_airbag * mp.max_plan

FROM 
    live_mrcs_db.dbo.other_process op
JOIN (
    SELECT 
        base_product, 
        MAX(max_plan) AS max_plan
    FROM 
        plan_from_pc
    GROUP BY 
        base_product
) mp ON op.base_product = mp.base_product;


DROP TABLE #MaxPlans;

    ";

   
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Error in executing query: " . print_r(sqlsrv_errors(), true);
    } else {
        echo "Masterlist updated successfully!";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
