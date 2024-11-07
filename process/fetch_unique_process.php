<?php
// combine.php

include 'conn.php';

$conn = sqlsrv_connect($serverName, $connectionOptions);


if ($conn === false) {
    error_log("SQLSRV Connection Error: " . print_r(sqlsrv_errors(), true), 3, '/var/log/sql_errors.log'); // Change path as needed
    die("Database connection failed.");
}


$sql = "
    SELECT 
   
up.[base_product],
up.[car_model],
up.[product],
up.[car_code],
up.[block],
up.[class],
up.[line_no],
up.[circuit_qty],
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
up.[quickstripping]

    FROM [live_mrcs_db].[dbo].[unique_process] AS up
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
