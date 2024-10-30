<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];


    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle);


        $deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[unique_process]";
        $deleteStmt = sqlsrv_query($conn, $deleteSql);

        if ($deleteStmt === false) {
            echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
            exit;
        }


        $sql = "INSERT INTO [live_mrcs_db].[dbo].[unique_process] (
           base_product,
car_model,
product,
car_code,
block,
class,
line_no,
circuit_qty,
joint_crimping_20tons_ps_115_2_3l_2,
ultrasonic_welding,
servo_press_crimping,
low_viscosity,
air_water_leak_test2,
heatshrink_low_viscosity,
stmac_shieldwire_j12,
hirose_sheath_stripping_927r,
hirose_unistrip,
hirose_acetate_taping,
hirose_manual_crimping_2_tons,
hirose_copper_taping,
hirose_hgt17ap_crimping,
stmac_aluminum,
manual_crimping_20tons,
dip_soldering_battery,
ultrasonic_dip_soldering_aluminum,
la_molding,
pressure_welding_sun_visor,
pressure_welding_dome_lamp,
casting_c377a,
coaxstrip_6580,
manual_crimping_2t_ferrule,
ferrule_auto_crimping,
enlarge_terminal_inspection,
waterproof_pad_press,
parts_insertion,
braided_wire_folding,
outside_ferrule_insertion,
joint_crimping_2t,
welding_at_head,
welding_taping,
uv_iii_1,
uv_iii_2,
uv_iii_4,
uv_iii_5,
uv_iii_7,
uv_iii_8,
drainwire_tip,
arc_welding,
c373a_yamaha,
cocripper,
quickstripping

        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                  ?)";

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