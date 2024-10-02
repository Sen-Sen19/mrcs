<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conn.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$response = [
    'success' => false,
    'message' => 'An error occurred.'
];

if (isset($data['data']) && !empty($data['data'])) {
    $rows = $data['data'];
    $errors = [];
    $processedCount = 0;

    $rows = array_filter($rows, function ($row) {
        return array_filter($row);
    });

    foreach ($rows as $row) {
        $product = isset($row[0]) ? trim($row[0]) : '';
        $car_model = isset($row[1]) ? trim($row[1]) : '';
        $base_product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4]) : '';
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        $v_type_twisting = isset($row[8]) ? trim($row[8]) : '';
        $manual_crimping_2tons_to_be_joint_on_sw = isset($row[9]) ? trim($row[9]) : '';
        $airbag = isset($row[10]) ? trim($row[10]) : '';
        $a_b_sub_pc = isset($row[11]) ? trim($row[11]) : '';
        $intermediate_ripping_uas_manual_nf_f = isset($row[12]) ? trim($row[12]) : '';
        $manual_crimping_4tons_nf_f = isset($row[13]) ? trim($row[13]) : '';
        $intermediate_ripping_uas_joint = isset($row[14]) ? trim($row[14]) : '';
        $intermediate_stripping_kb10 = isset($row[15]) ? trim($row[15]) : '';
        $manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 = isset($row[16]) ? trim($row[16]) : '';
        $joint_taping_11mm_ps_150_ll_2 = isset($row[17]) ? trim($row[17]) : '';
        $joint_taping_12mm_ps_700_l_2_ps_200_m_2 = isset($row[18]) ? trim($row[18]) : '';
        $joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 = isset($row[19]) ? trim($row[19]) : '';
        $heat_shrink_joint_crimping = isset($row[20]) ? trim($row[20]) : '';
        $heat_shrink_la_terminal = isset($row[21]) ? trim($row[21]) : '';
        $manual_crimping_2tons_nsc_weld = isset($row[22]) ? trim($row[22]) : '';
        $intermediate_stripping_kb10_nsc_weld = isset($row[23]) ? trim($row[23]) : '';
        $joint_crimping_2tons_ps_017_ss_2_nsc_weld = isset($row[24]) ? trim($row[24]) : '';
        $joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld = isset($row[25]) ? trim($row[25]) : '';
        $silicon_injection = isset($row[26]) ? trim($row[26]) : '';
        $welding_taping_13mm = isset($row[27]) ? trim($row[27]) : '';
        $heat_shrink_welding = isset($row[28]) ? trim($row[28]) : '';
        $casting_c385_shieldwire = isset($row[29]) ? trim($row[29]) : '';
        $quick_stripping_927_auto = isset($row[30]) ? trim($row[30]) : '';
        $mira_quick_stripping = isset($row[31]) ? trim($row[31]) : '';
        $quick_stripping_311_manual = isset($row[32]) ? trim($row[32]) : '';
        $manual_heat_shrink_blower_sumitube = isset($row[33]) ? trim($row[33]) : '';
        $manual_taping_dispenser_sw = isset($row[34]) ? trim($row[34]) : '';
        $heat_shrink_joint_crimping_sw = isset($row[35]) ? trim($row[35]) : '';
        $casting_c373 = isset($row[36]) ? trim($row[36]) : '';
        $casting_c377 = isset($row[37]) ? trim($row[37]) : '';
        $casting_c371 = isset($row[38]) ? trim($row[38]) : '';
        $manual_heat_shrink_blower_battery = isset($row[39]) ? trim($row[39]) : '';
        $casting_c373_normal = isset($row[40]) ? trim($row[40]) : '';
        $casting_c371_normal = isset($row[41]) ? trim($row[41]) : '';
        $manual_2tons_bending = isset($row[42]) ? trim($row[42]) : '';
        $manual_5tons_battery = isset($row[43]) ? trim($row[43]) : '';
        $al_looping = isset($row[44]) ? trim($row[44]) : '';
        $soldering = isset($row[45]) ? trim($row[45]) : '';
        $waterproof_agent_injection = isset($row[46]) ? trim($row[46]) : '';
        $thermosetting = isset($row[47]) ? trim($row[47]) : '';
        $completion = isset($row[48]) ? trim($row[48]) : '';
        $picking_looping = isset($row[49]) ? trim($row[49]) : '';
        $welding_end = isset($row[50]) ? trim($row[50]) : '';
        $intermediate_welding = isset($row[51]) ? trim($row[51]) : '';
        $sam_set_a_b = isset($row[52]) ? trim($row[52]) : '';
        $sam_set_normal = isset($row[53]) ? trim($row[53]) : '';
        $total_circuit = isset($row[54]) ? trim($row[54]) : '';
        $new_airbag = isset($row[55]) ? trim($row[55]) : '';


        $sql = "
        MERGE other_process AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ? ))

        AS source (base_product, car_model, product, car_code, block, class, line_no, circuit_qty,
            v_type_twisting, manual_crimping_2tons_to_be_joint_on_sw, airbag, a_b_sub_pc,
            intermediate_ripping_uas_manual_nf_f, manual_crimping_4tons_nf_f, intermediate_ripping_uas_joint, 
            intermediate_stripping_kb10, manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22,
            joint_taping_11mm_ps_150_ll_2, joint_taping_12mm_ps_700_l_2_ps_200_m_2, 
            joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,heat_shrink_joint_crimping, heat_shrink_la_terminal, manual_crimping_2tons_nsc_weld,intermediate_stripping_kb10_nsc_weld,joint_crimping_2tons_ps_017_ss_2_nsc_weld,joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,silicon_injection,welding_taping_13mm,heat_shrink_welding,casting_c385_shieldwire,quick_stripping_927_auto,
            mira_quick_stripping,
            quick_stripping_311_manual,
            manual_heat_shrink_blower_sumitube,
            manual_taping_dispenser_sw,
            heat_shrink_joint_crimping_sw,
            casting_c373,
            casting_c377,
            casting_c371,
            manual_heat_shrink_blower_battery,
            casting_c373_normal,
            casting_c371_normal,
            manual_2tons_bending,
            manual_5tons_battery,
            al_looping,
            soldering,
            waterproof_agent_injection,
            thermosetting,
            completion,
            picking_looping,
            welding_end,
            intermediate_welding,
            sam_set_a_b,
            sam_set_normal,
            total_circuit,
            new_airbag
)
        ON target.car_model = source.car_model 
           AND target.product = source.product 
           AND target.car_code = source.car_code 
           AND target.block = source.block 
           AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
                target.base_product = source.base_product,
                target.line_no = source.line_no,
                target.circuit_qty = source.circuit_qty,
                target.v_type_twisting = source.v_type_twisting,
                target.manual_crimping_2tons_to_be_joint_on_sw = source.manual_crimping_2tons_to_be_joint_on_sw,
                target.airbag = source.airbag,
                target.a_b_sub_pc = source.a_b_sub_pc,
                target.intermediate_ripping_uas_manual_nf_f = source.intermediate_ripping_uas_manual_nf_f,
                target.manual_crimping_4tons_nf_f = source.manual_crimping_4tons_nf_f,
                target.intermediate_ripping_uas_joint = source.intermediate_ripping_uas_joint,
                target.intermediate_stripping_kb10 = source.intermediate_stripping_kb10,
                target.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 = source.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22,
                target.joint_taping_11mm_ps_150_ll_2 = source.joint_taping_11mm_ps_150_ll_2,
                target.joint_taping_12mm_ps_700_l_2_ps_200_m_2 = source.joint_taping_12mm_ps_700_l_2_ps_200_m_2,
                target.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 = source.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,
                target.heat_shrink_joint_crimping = source.heat_shrink_joint_crimping,
                target.heat_shrink_la_terminal = source.heat_shrink_la_terminal,
                target.manual_crimping_2tons_nsc_weld = source.manual_crimping_2tons_nsc_weld,
                target.intermediate_stripping_kb10_nsc_weld = source.intermediate_stripping_kb10_nsc_weld,
                target.joint_crimping_2tons_ps_017_ss_2_nsc_weld = source.joint_crimping_2tons_ps_017_ss_2_nsc_weld,
                target.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld = source.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,
                target.silicon_injection = source.silicon_injection,
                target.welding_taping_13mm = source.welding_taping_13mm,
                target.heat_shrink_welding = source.heat_shrink_welding,
                target.casting_c385_shieldwire = source.casting_c385_shieldwire,
                target.quick_stripping_927_auto = source.quick_stripping_927_auto,
                target.mira_quick_stripping = source.mira_quick_stripping,
                target.quick_stripping_311_manual = source.quick_stripping_311_manual,
                target.manual_heat_shrink_blower_sumitube = source.manual_heat_shrink_blower_sumitube,
                target.manual_taping_dispenser_sw = source.manual_taping_dispenser_sw,
                target.heat_shrink_joint_crimping_sw = source.heat_shrink_joint_crimping_sw,
                target.casting_c373 = source.casting_c373,
                target.casting_c377 = source.casting_c377,
                target.casting_c371 = source.casting_c371,
                target.manual_heat_shrink_blower_battery = source.manual_heat_shrink_blower_battery,
                target.casting_c373_normal = source.casting_c373_normal,
                target.casting_c371_normal = source.casting_c371_normal,
                target.manual_2tons_bending = source.manual_2tons_bending,
                target.manual_5tons_battery = source.manual_5tons_battery,
                target.al_looping = source.al_looping,
                target.soldering = source.soldering,
                target.waterproof_agent_injection = source.waterproof_agent_injection,
                target.thermosetting = source.thermosetting,
                target.completion = source.completion,
                target.picking_looping = source.picking_looping,
                target.welding_end = source.welding_end,
                target.intermediate_welding = source.intermediate_welding,
                target.sam_set_a_b = source.sam_set_a_b,
                target.sam_set_normal = source.sam_set_normal,
                target.total_circuit = source.total_circuit,
                target.new_airbag = source.new_airbag



        WHEN NOT MATCHED THEN
            INSERT (base_product, car_model, product, car_code, block, class, line_no, circuit_qty, v_type_twisting,
                manual_crimping_2tons_to_be_joint_on_sw, airbag, a_b_sub_pc, intermediate_ripping_uas_manual_nf_f,
                manual_crimping_4tons_nf_f, intermediate_ripping_uas_joint, intermediate_stripping_kb10,
                manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22, joint_taping_11mm_ps_150_ll_2,
                joint_taping_12mm_ps_700_l_2_ps_200_m_2, joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,heat_shrink_joint_crimping, heat_shrink_la_terminal, manual_crimping_2tons_nsc_weld,intermediate_stripping_kb10_nsc_weld,joint_crimping_2tons_ps_017_ss_2_nsc_weld,joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,silicon_injection,welding_taping_13mm,heat_shrink_welding,casting_c385_shieldwire,quick_stripping_927_auto,
                mira_quick_stripping,
                quick_stripping_311_manual,
                manual_heat_shrink_blower_sumitube,
                manual_taping_dispenser_sw,
                heat_shrink_joint_crimping_sw,
                casting_c373,
                casting_c377,
                casting_c371,
                manual_heat_shrink_blower_battery,
                casting_c373_normal,
                casting_c371_normal,
                manual_2tons_bending,
                manual_5tons_battery,
                al_looping,
                soldering,
                waterproof_agent_injection,
                thermosetting,
                completion,
                picking_looping,
                welding_end,
                intermediate_welding,
                sam_set_a_b,
                sam_set_normal,
                total_circuit,
                new_airbag)

      VALUES ( source.base_product, source.car_model, source.product, source.car_code, source.block, source.class,
                source.line_no, source.circuit_qty, source.v_type_twisting, source.manual_crimping_2tons_to_be_joint_on_sw,
                source.airbag, source.a_b_sub_pc, source.intermediate_ripping_uas_manual_nf_f, source.manual_crimping_4tons_nf_f,
                source.intermediate_ripping_uas_joint, source.intermediate_stripping_kb10, 
                source.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22, 
                source.joint_taping_11mm_ps_150_ll_2, source.joint_taping_12mm_ps_700_l_2_ps_200_m_2, 
                source.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,heat_shrink_joint_crimping, heat_shrink_la_terminal, manual_crimping_2tons_nsc_weld,intermediate_stripping_kb10_nsc_weld,joint_crimping_2tons_ps_017_ss_2_nsc_weld,joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,silicon_injection,welding_taping_13mm,heat_shrink_welding,casting_c385_shieldwire,
                source.quick_stripping_927_auto,
                source.mira_quick_stripping,
                source.quick_stripping_311_manual,
                source.manual_heat_shrink_blower_sumitube,
                source.manual_taping_dispenser_sw,
                source.heat_shrink_joint_crimping_sw,
                source.casting_c373,
                source.casting_c377,
                source.casting_c371,
                source.manual_heat_shrink_blower_battery,
                source.casting_c373_normal,
                source.casting_c371_normal,
                source.manual_2tons_bending,
                source.manual_5tons_battery,
                source.al_looping,
                source.soldering,
                source.waterproof_agent_injection,
                source.thermosetting,
                source.completion,
                source.picking_looping,
                source.welding_end,
                source.intermediate_welding,
                source.sam_set_a_b,
                source.sam_set_normal,
                source.total_circuit,
                source.new_airbag
);
        ";

        $params = [
            $base_product,
            $car_model,
            $product,
            $car_code,
            $block,
            $class,
            $line_no,
            $circuit_qty,
            $v_type_twisting,
            $manual_crimping_2tons_to_be_joint_on_sw,
            $airbag,
            $a_b_sub_pc,
            $intermediate_ripping_uas_manual_nf_f,
            $manual_crimping_4tons_nf_f,
            $intermediate_ripping_uas_joint,
            $intermediate_stripping_kb10,
            $manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22,
            $joint_taping_11mm_ps_150_ll_2,
            $joint_taping_12mm_ps_700_l_2_ps_200_m_2,
            $joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,
            $heat_shrink_joint_crimping,
            $heat_shrink_la_terminal,
            $manual_crimping_2tons_nsc_weld,
            $intermediate_stripping_kb10_nsc_weld,
            $joint_crimping_2tons_ps_017_ss_2_nsc_weld,
            $joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,
            $silicon_injection,
            $welding_taping_13mm,
            $heat_shrink_welding,
            $casting_c385_shieldwire,
            $quick_stripping_927_auto,
            $mira_quick_stripping,
            $quick_stripping_311_manual,
            $manual_heat_shrink_blower_sumitube,
            $manual_taping_dispenser_sw,
            $heat_shrink_joint_crimping_sw,
            $casting_c373,
            $casting_c377,
            $casting_c371,
            $manual_heat_shrink_blower_battery,
            $casting_c373_normal,
            $casting_c371_normal,
            $manual_2tons_bending,
            $manual_5tons_battery,
            $al_looping,
            $soldering,
            $waterproof_agent_injection,
            $thermosetting,
            $completion,
            $picking_looping,
            $welding_end,
            $intermediate_welding,
            $sam_set_a_b,
            $sam_set_normal,
            $total_circuit,
            $new_airbag

        ];

        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            $errors[] = 'Error executing statement: ' . print_r(sqlsrv_errors(), true);
        } else {
            $processedCount++;
        }

    }

    if (empty($errors)) {
        $response['success'] = true;
        $response['message'] = "Successfully processed $processedCount records.";
    } else {
        $response['message'] = implode("\n", $errors);
    }
} else {
    $response['message'] = 'No data received.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>