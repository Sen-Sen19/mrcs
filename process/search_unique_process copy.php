<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

if (isset($_GET['base_product'])) {
    $base_product = $_GET['base_product'];

    $tables = [
        'unique_process',
    ];

    $mergedResult = []; 

    foreach ($tables as $table) {
       
        $sql = "SELECT 
                    base_product
      ,car_model
      ,product
      ,car_code
      ,block
      ,class
      ,line_no
      ,circuit_qty
      ,joint_crimping_20tons_ps_115_2_3l_2
      ,ultrasonic_welding
      ,servo_press_crimping
      ,low_viscosity
      ,air_water_leak_test2
      ,heatshrink_low_viscosity
      ,stmac_shieldwire_j12
      ,hirose_sheath_stripping_927r
      ,hirose_unistrip
      ,hirose_acetate_taping
      ,hirose_manual_crimping_2_tons
      ,hirose_copper_taping
      ,hirose_hgt17ap_crimping
      ,stmac_aluminum
      ,manual_crimping_20tons
      ,dip_soldering_battery
      ,ultrasonic_dip_soldering_aluminum
      ,la_molding
      ,pressure_welding_sun_visor
      ,pressure_welding_dome_lamp
      ,casting_c377a
      ,coaxstrip_6580
      ,manual_crimping_2t_ferrule
      ,ferrule_auto_crimping
      ,enlarge_terminal_inspection
      ,waterproof_pad_press
      ,parts_insertion
      ,braided_wire_folding
      ,outside_ferrule_insertion
      ,joint_crimping_2t
      ,welding_at_head
      ,welding_taping
      ,uv_iii_1
      ,uv_iii_2
      ,uv_iii_4
      ,uv_iii_5
      ,uv_iii_7
      ,uv_iii_8
      ,drainwire_tip
      ,arc_welding
      ,c373a_yamaha
      ,cocripper
      ,quickstripping
                FROM $table WHERE base_product = ?";
        
        $params = [$base_product];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            echo json_encode(['error' => 'Query failed', 'details' => sqlsrv_errors()]);
            exit;
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                $mergedResult[$key] = $value; 
            }
        }
    }

    if (empty($mergedResult)) {
        echo json_encode(['message' => 'No results found']);
    } else {
        echo json_encode($mergedResult); 
    }
}
?>
