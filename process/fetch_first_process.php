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
        fp.[nsc_10]
    FROM [live_mrcs_db].[dbo].[first_process] AS fp
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
