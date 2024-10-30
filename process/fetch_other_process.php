<?php
// combine.php

// Database connection settings
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);

// Establishing the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if connection was successful
if ($conn === false) {
    error_log("SQLSRV Connection Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Database connection failed.");
}

// SQL query to fetch data without LEFT JOIN and the specific column
$sql = "
    SELECT 
        op.[base_product], 
        op.[car_model], 
        op.[product], 
        op.[car_code], 
        op.[block], 
        op.[class], 
        op.[line_no], 
        op.[circuit_qty], 
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

    FROM [live_mrcs_db].[dbo].[other_process] AS op
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
