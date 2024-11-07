<?php

include 'conn.php';

$conn = sqlsrv_connect($serverName, $connectionOptions);


if ($conn === false) {
    error_log("SQLSRV Connection Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Database connection failed.");
}


$sql = "
    SELECT 
        sp.[base_product],
    sp.[car_model],
    sp.[product],
    sp.[car_code],
    sp.[block],
    sp.[class],
    sp.[line_no],
    sp.[circuit_qty],
sp.[joint_crimping_2tons_ps_800_s_2],
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
sp.[welding_at_head_0_13_electrode_2]



    FROM [live_mrcs_db].[dbo].[secondary_process] AS sp
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
