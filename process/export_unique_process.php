<?php
include 'conn.php';


$sql = "SELECT 
   product, car_model,  base_product,  car_code, block, class, line_no, circuit_qty, joint_crimping_20tons_ps_115_2_3l_2, ultrasonic_welding, servo_press_crimping, low_viscosity, air_water_leak_test2, heatshrink_low_viscosity, stmac_shieldwire_j12, hirose_sheath_stripping_927r, hirose_unistrip, hirose_acetate_taping, hirose_manual_crimping_2_tons, hirose_copper_taping, hirose_hgt17ap_crimping, stmac_aluminum, manual_crimping_20tons, dip_soldering_battery, ultrasonic_dip_soldering_aluminum, la_molding, pressure_welding_sun_visor, pressure_welding_dome_lamp, casting_c377a, coaxstrip_6580, manual_crimping_2t_ferrule, ferrule_auto_crimping, enlarge_terminal_inspection, waterproof_pad_press, parts_insertion, braided_wire_folding, outside_ferrule_insertion, joint_crimping_2t, welding_at_head, welding_taping, uv_iii_1, uv_iii_2, uv_iii_4, uv_iii_5, uv_iii_7, uv_iii_8, drainwire_tip, arc_welding, c373a_yamaha, cocripper, quickstripping
    FROM unique_process";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Unique_Process_' . date("Y-m-d") . '.csv"');


$output = fopen('php://output', 'w');

fputcsv($output, [
    'PRODUCT',
'CAR MODEL',
'BASE PRODUCT',
'CAR CODE',
'BLOCK',
'CLASS',
'LINE NO',
'CIRCUIT QTY',
'JOINT CRIMPING 20TONS PS 115 2 3L 2',
'ULTRASONIC WELDING',
'SERVO PRESS CRIMPING',
'LOW VISCOSITY',
'AIR WATER LEAK TEST',
'HEATSHRINK LOW VISCOSITY',
'STMAC SHIELDWIRE J12',
'HIROSE SHEATH STRIPPING 927R',
'HIROSE UNISTRIP',
'HIROSE ACETATE TAPING',
'HIROSE MANUAL CRIMPING 2 TONS',
'HIROSE COPPER TAPING',
'HIROSE HGT17AP CRIMPING',
'STMAC ALUMINUM',
'MANUAL CRIMPING 20TONS',
'DIP SOLDERING BATTERY',
'ULTRASONIC DIP SOLDERING ALUMINUM',
'LA MOLDING',
'PRESSURE WELDING SUN VISOR',
'PRESSURE WELDING DOME LAMP',
'CASTING C377A',
'COAXSTRIP 6580',
'MANUAL CRIMPING 2T FERRULE',
'FERRULE AUTO CRIMPING',
'ENLARGE TERMINAL INSPECTION',
'WATERPROOF PAD PRESS',
'PARTS INSERTION',
'BRAIDED WIRE FOLDING',
'OUTSIDE FERRULE INSERTION',
'JOINT CRIMPING 2T',
'WELDING AT HEAD',
'WELDING TAPING',
'UV III 1',
'UV III 2',
'UV III 4',
'UV III 5',
'UV III 7',
'UV III 8',
'DRAINWIRE TIP',
'ARC WELDING',
'C373A YAMAHA',
'COCRIPPER',
'QUICKSTRIPPING',

]);

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    foreach ($row as $key => $value) {

        if ($value === null) {
            $row[$key] = '';
        }
    }
    

    fputcsv($output, $row);
}


fclose($output);
exit();
?>
