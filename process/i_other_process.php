<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];


    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle);


        $deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[other_process]";
        $deleteStmt = sqlsrv_query($conn, $deleteSql);

        if ($deleteStmt === false) {
            echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
            exit;
        }


        $sql = "INSERT INTO [live_mrcs_db].[dbo].[other_process] (
       base_product,
car_model,
product,
car_code,
block,
class,
line_no,
circuit_qty,
v_type_twisting,
manual_crimping_2tons_to_be_joint_on_sw,
airbag,
a_b_sub_pc,
intermediate_ripping_uas_manual_nf_f,
manual_crimping_4tons_nf_f,
intermediate_ripping_uas_joint,
intermediate_stripping_kb10,
manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22,
joint_taping_11mm_ps_150_ll_2,
joint_taping_12mm_ps_700_l_2_ps_200_m_2,
joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,
heat_shrink_joint_crimping,
heat_shrink_la_terminal,
manual_crimping_2tons_nsc_weld,
intermediate_stripping_kb10_nsc_weld,
joint_crimping_2tons_ps_017_ss_2_nsc_weld,
joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,
silicon_injection,
welding_taping_13mm,
heat_shrink_welding,
casting_c385_shieldwire,
quick_stripping_927_auto,
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


        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?)";

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $stmt = sqlsrv_prepare($conn, $sql, $data);
            if (!sqlsrv_execute($stmt)) {
                echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
                exit;
            }
        }

        fclose($handle);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Could not open the CSV file.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}

sqlsrv_close($conn);
?> 