<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];


    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle);


        $deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[secondary_process]";
        $deleteStmt = sqlsrv_query($conn, $deleteSql);

        if ($deleteStmt === false) {
            echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
            exit;
        }


        $sql = "INSERT INTO [live_mrcs_db].[dbo].[secondary_process] (
           base_product,
car_model,
product,
car_code,
block,
class,
line_no,
circuit_qty,
joint_crimping_2tons_ps_800_s_2,
joint_crimping_2tons_ps_200_m_2,
joint_crimping_2tons_ps_017_ss_2,
joint_crimping_2tons_ps_126_sst2,
joint_crimping_4tons_ps_700_l_2,
joint_crimping_5tons_ps_150_ll,
manual_crimping_shieldwire_2t,
manual_crimping_shieldwire_4t,
joint_crimping_2tons_ps_800_s_2_sw,
joint_crimping_2tons_ps_126_sst2_sw,
joint_crimping_2tons_ps_017_ss_2_sw,
twisting_primary_normal_wires_l_less_than_1500mm,
twisting_primary_normal_wires_l_less_than_3000mm,
twisting_primary_normal_wires_l_less_than_4500mm,
twisting_primary_normal_wires_l_less_than_6000mm,
twisting_primary_normal_wires_l_less_than_7500mm,
twisting_primary_normal_wires_l_less_than_9000mm,
twisting_secondary_normal_wires_l_less_than_1500mm,
twisting_secondary_normal_wires_l_less_than_3000mm,
twisting_secondary_normal_wires_l_less_than_4500mm,
twisting_secondary_normal_wires_l_less_than_6000mm,
twisting_secondary_normal_wires_l_less_than_7500mm,
twisting_secondary_normal_wires_l_less_than_9000mm,
twisting_primary_aluminum_wires_l_less_than_1500mm,
twisting_primary_aluminum_wires_l_less_than_3000mm,
twisting_primary_aluminum_wires_l_less_than_4500mm,
twisting_primary_aluminum_wires_l_less_than_6000mm,
twisting_secondary_aluminum_wires_l_less_than_1500mm,
twisting_secondary_aluminum_wires_l_less_than_3000mm,
twisting_secondary_aluminum_wires_l_less_than_4500mm,
twisting_secondary_aluminum_wires_l_less_than_6000mm,
twisting_secondary_aluminum_wires_l_less_than_7500mm,
twisting_secondary_aluminum_wires_l_less_than_9000mm,
manual_crimping_2tons_normal_single_crimp,
manual_crimping_2tons_normal_double_crimp,
manual_crimping_2tons_double_crimp_twisted,
manual_crimping_2tons_la_terminal,
manual_crimping_2tons_double_crimp_la_terminal,
manual_crimping_2tons_w_gomusen,
manual_crimping_4tons_double_crimp_twisted,
manual_crimping_4tons_normal_single_crimp,
manual_crimping_4tons_normal_double_crimp,
manual_crimping_4tons_la_terminal,
manual_crimping_4tons_double_crimp_la_terminal,
manual_crimping_4tons_w_gomusen,
manual_crimping_5tons,
intermediate_butt_welding_except_0_13_electrode_1,
intermediate_butt_welding_except_0_13_electrode_2,
intermediate_butt_welding_except_0_13_electrode_3,
intermediate_butt_welding_except_0_13_electrode_4,
intermediate_butt_welding_except_0_13_electrode_5,
welding_at_head_except_0_13_electrode_1,
welding_at_head_except_0_13_electrode_2,
welding_at_head_except_0_13_electrode_3,
welding_at_head_except_0_13_electrode_4,
welding_at_head_except_0_13_electrode_5,
intermediate_butt_welding_0_13_electrode_1,
welding_at_head_0_13_electrode_1,
intermediate_butt_welding_0_13_electrode_2,
welding_at_head_0_13_electrode_2


        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                   ?, ?, ?, ?, ?, ?, ?, ?)";

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