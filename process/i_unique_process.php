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
        $base_product = isset($row[2]) ? trim($row[2]) : '';
        $car_model = isset($row[1]) ? trim($row[1]) : '';
        $product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4]) : '';
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        $joint_crimping_20tons_ps_115_2_3l_2 = isset($row[8]) ? trim($row[8]) : '';
        $ultrasonic_welding = isset($row[9]) ? trim($row[9]) : '';
        $servo_press_crimping = isset($row[10]) ? trim($row[10]) : '';
        $low_viscosity = isset($row[11]) ? trim($row[11]) : '';
        $air_water_leak_test2 = isset($row[12]) ? trim($row[12]) : '';
        $heatshrink_low_viscosity = isset($row[13]) ? trim($row[13]) : '';
        $stmac_shieldwire_j12 = isset($row[14]) ? trim($row[14]) : '';
        $hirose_sheath_stripping_927r = isset($row[15]) ? trim($row[15]) : '';
        $hirose_unistrip = isset($row[16]) ? trim($row[16]) : '';
        $hirose_acetate_taping = isset($row[17]) ? trim($row[17]) : '';
        $hirose_manual_crimping_2_tons = isset($row[18]) ? trim($row[18]) : '';
        $hirose_copper_taping = isset($row[19]) ? trim($row[19]) : '';
        $hirose_hgt17ap_crimping = isset($row[20]) ? trim($row[20]) : '';
        $stmac_aluminum = isset($row[21]) ? trim($row[21]) : '';
        $manual_crimping_20tons = isset($row[22]) ? trim($row[22]) : '';
        $dip_soldering_battery = isset($row[23]) ? trim($row[23]) : '';
        $ultrasonic_dip_soldering_aluminum = isset($row[24]) ? trim($row[24]) : '';
        $la_molding = isset($row[25]) ? trim($row[25]) : '';
        $pressure_welding_sun_visor = isset($row[26]) ? trim($row[26]) : '';
        $pressure_welding_dome_lamp = isset($row[27]) ? trim($row[27]) : '';
        $casting_c377a = isset($row[28]) ? trim($row[28]) : '';
        $coaxstrip_6580 = isset($row[29]) ? trim($row[29]) : '';
        $manual_crimping_2t_ferrule = isset($row[30]) ? trim($row[30]) : '';
        $ferrule_auto_crimping = isset($row[31]) ? trim($row[31]) : '';
        $enlarge_terminal_inspection = isset($row[32]) ? trim($row[32]) : '';
        $waterproof_pad_press = isset($row[33]) ? trim($row[33]) : '';
        $parts_insertion = isset($row[34]) ? trim($row[34]) : '';
        $braided_wire_folding = isset($row[35]) ? trim($row[35]) : '';
        $outside_ferrule_insertion = isset($row[36]) ? trim($row[36]) : '';
        $joint_crimping_2t = isset($row[37]) ? trim($row[37]) : '';
        $welding_at_head = isset($row[38]) ? trim($row[38]) : '';
        $welding_taping = isset($row[39]) ? trim($row[39]) : '';
        $uv_iii_1 = isset($row[40]) ? trim($row[40]) : '';
        $uv_iii_2 = isset($row[41]) ? trim($row[41]) : '';
        $uv_iii_4 = isset($row[42]) ? trim($row[42]) : '';
        $uv_iii_5 = isset($row[43]) ? trim($row[43]) : '';
        $uv_iii_7 = isset($row[44]) ? trim($row[44]) : '';
        $uv_iii_8 = isset($row[45]) ? trim($row[45]) : '';
        $drainwire_tip = isset($row[46]) ? trim($row[46]) : '';
        $arc_welding = isset($row[47]) ? trim($row[47]) : ''; 
        $c373a_yamaha = isset($row[48]) ? trim($row[48]) : ''; 
        $cocripper = isset($row[49]) ? trim($row[49]) : ''; 
        $quickstripping = isset($row[50]) ? trim($row[50]) : ''; 

        $sql = "
        MERGE unique_process AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?))
        AS source (base_product, car_model, product, car_code, block, class, line_no, circuit_qty, joint_crimping_20tons_ps_115_2_3l_2, ultrasonic_welding, servo_press_crimping, low_viscosity, air_water_leak_test2, heatshrink_low_viscosity, stmac_shieldwire_j12, hirose_sheath_stripping_927r, hirose_unistrip, hirose_acetate_taping, hirose_manual_crimping_2_tons, hirose_copper_taping, hirose_hgt17ap_crimping, stmac_aluminum, manual_crimping_20tons, dip_soldering_battery, ultrasonic_dip_soldering_aluminum, la_molding, pressure_welding_sun_visor, pressure_welding_dome_lamp, casting_c377a, coaxstrip_6580, manual_crimping_2t_ferrule, ferrule_auto_crimping, enlarge_terminal_inspection, waterproof_pad_press, parts_insertion, braided_wire_folding, outside_ferrule_insertion, joint_crimping_2t, welding_at_head, welding_taping, uv_iii_1, uv_iii_2, uv_iii_4, uv_iii_5, uv_iii_7, uv_iii_8, drainwire_tip, arc_welding, c373a_yamaha, cocripper, quickstripping)
        ON target.car_model = source.car_model AND target.product = source.product AND target.car_code = source.car_code AND target.block = source.block AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
                target.base_product = source.base_product,
                target.line_no = source.line_no,
                target.circuit_qty = source.circuit_qty,
                target.joint_crimping_20tons_ps_115_2_3l_2 = source.joint_crimping_20tons_ps_115_2_3l_2,
                target.ultrasonic_welding = source.ultrasonic_welding,
                target.servo_press_crimping = source.servo_press_crimping,
                target.low_viscosity = source.low_viscosity,
                target.air_water_leak_test2 = source.air_water_leak_test2,
                target.heatshrink_low_viscosity = source.heatshrink_low_viscosity,
                target.stmac_shieldwire_j12 = source.stmac_shieldwire_j12,
                target.hirose_sheath_stripping_927r = source.hirose_sheath_stripping_927r,
                target.hirose_unistrip = source.hirose_unistrip,
                target.hirose_acetate_taping = source.hirose_acetate_taping,
                target.hirose_manual_crimping_2_tons = source.hirose_manual_crimping_2_tons,
                target.hirose_copper_taping = source.hirose_copper_taping,
                target.hirose_hgt17ap_crimping = source.hirose_hgt17ap_crimping,
                target.stmac_aluminum = source.stmac_aluminum,
                target.manual_crimping_20tons = source.manual_crimping_20tons,
                target.dip_soldering_battery = source.dip_soldering_battery,
                target.ultrasonic_dip_soldering_aluminum = source.ultrasonic_dip_soldering_aluminum,
                target.la_molding = source.la_molding,
                target.pressure_welding_sun_visor = source.pressure_welding_sun_visor,
                target.pressure_welding_dome_lamp = source.pressure_welding_dome_lamp,
                target.casting_c377a = source.casting_c377a,
                target.coaxstrip_6580 = source.coaxstrip_6580,
                target.manual_crimping_2t_ferrule = source.manual_crimping_2t_ferrule,
                target.ferrule_auto_crimping = source.ferrule_auto_crimping,
                target.enlarge_terminal_inspection = source.enlarge_terminal_inspection,
                target.waterproof_pad_press = source.waterproof_pad_press,
                target.parts_insertion = source.parts_insertion,
                target.braided_wire_folding = source.braided_wire_folding,
                target.outside_ferrule_insertion = source.outside_ferrule_insertion,
                target.joint_crimping_2t = source.joint_crimping_2t,
                target.welding_at_head = source.welding_at_head,
                target.welding_taping = source.welding_taping,
                target.uv_iii_1 = source.uv_iii_1,
                target.uv_iii_2 = source.uv_iii_2,
                target.uv_iii_4 = source.uv_iii_4,
                target.uv_iii_5 = source.uv_iii_5,
                target.uv_iii_7 = source.uv_iii_7,
                target.uv_iii_8 = source.uv_iii_8,
                target.drainwire_tip = source.drainwire_tip,
                target.arc_welding = source.arc_welding,
                target.c373a_yamaha = source.c373a_yamaha,
                target.cocripper = source.cocripper,
                target.quickstripping = source.quickstripping
        WHEN NOT MATCHED THEN
            INSERT (base_product, car_model, product, car_code, block, class, line_no, circuit_qty, joint_crimping_20tons_ps_115_2_3l_2, ultrasonic_welding, servo_press_crimping, low_viscosity, air_water_leak_test2, heatshrink_low_viscosity, stmac_shieldwire_j12, hirose_sheath_stripping_927r, hirose_unistrip, hirose_acetate_taping, hirose_manual_crimping_2_tons, hirose_copper_taping, hirose_hgt17ap_crimping, stmac_aluminum, manual_crimping_20tons, dip_soldering_battery, ultrasonic_dip_soldering_aluminum, la_molding, pressure_welding_sun_visor, pressure_welding_dome_lamp, casting_c377a, coaxstrip_6580, manual_crimping_2t_ferrule, ferrule_auto_crimping, enlarge_terminal_inspection, waterproof_pad_press, parts_insertion, braided_wire_folding, outside_ferrule_insertion, joint_crimping_2t, welding_at_head, welding_taping, uv_iii_1, uv_iii_2, uv_iii_4, uv_iii_5, uv_iii_7, uv_iii_8, drainwire_tip, arc_welding, c373a_yamaha, cocripper, quickstripping)
            VALUES (source.base_product, source.car_model, source.product, source.car_code, source.block, source.class, source.line_no, source.circuit_qty, source.joint_crimping_20tons_ps_115_2_3l_2, source.ultrasonic_welding, source.servo_press_crimping, source.low_viscosity, source.air_water_leak_test2, source.heatshrink_low_viscosity, source.stmac_shieldwire_j12, source.hirose_sheath_stripping_927r, source.hirose_unistrip, source.hirose_acetate_taping, source.hirose_manual_crimping_2_tons, source.hirose_copper_taping, source.hirose_hgt17ap_crimping, source.stmac_aluminum, source.manual_crimping_20tons, source.dip_soldering_battery, source.ultrasonic_dip_soldering_aluminum, source.la_molding, source.pressure_welding_sun_visor, source.pressure_welding_dome_lamp, source.casting_c377a, source.coaxstrip_6580, source.manual_crimping_2t_ferrule, source.ferrule_auto_crimping, source.enlarge_terminal_inspection, source.waterproof_pad_press, source.parts_insertion, source.braided_wire_folding, source.outside_ferrule_insertion, source.joint_crimping_2t, source.welding_at_head, source.welding_taping, source.uv_iii_1, source.uv_iii_2, source.uv_iii_4, source.uv_iii_5, source.uv_iii_7, source.uv_iii_8, source.drainwire_tip, source.arc_welding, source.c373a_yamaha, source.cocripper, source.quickstripping);
        ";

        $params = [
            $base_product, $car_model, $product, $car_code, $block, $class, $line_no, $circuit_qty, $joint_crimping_20tons_ps_115_2_3l_2, $ultrasonic_welding, $servo_press_crimping, $low_viscosity, $air_water_leak_test2, $heatshrink_low_viscosity, $stmac_shieldwire_j12, $hirose_sheath_stripping_927r, $hirose_unistrip, $hirose_acetate_taping, $hirose_manual_crimping_2_tons, $hirose_copper_taping, $hirose_hgt17ap_crimping, $stmac_aluminum, $manual_crimping_20tons, $dip_soldering_battery, $ultrasonic_dip_soldering_aluminum, $la_molding, $pressure_welding_sun_visor, $pressure_welding_dome_lamp, $casting_c377a, $coaxstrip_6580, $manual_crimping_2t_ferrule, $ferrule_auto_crimping, $enlarge_terminal_inspection, $waterproof_pad_press, $parts_insertion, $braided_wire_folding, $outside_ferrule_insertion, $joint_crimping_2t, $welding_at_head, $welding_taping, $uv_iii_1, $uv_iii_2, $uv_iii_4, $uv_iii_5, $uv_iii_7, $uv_iii_8, $drainwire_tip, $arc_welding, $c373a_yamaha, $cocripper, $quickstripping
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

