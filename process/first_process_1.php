<?php

include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];

 
    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle); 


        $deleteSql = "DELETE FROM [live_mrcs_db].[dbo].[first_process]";
        $deleteStmt = sqlsrv_query($conn, $deleteSql);
        
        if ($deleteStmt === false) {
            echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
            exit;
        }


        $sql = "INSERT INTO [live_mrcs_db].[dbo].[first_process] (
            base_product, car_model, product, car_code, block, class, line_no, circuit_qty,
            trd_nwpa_0_13, trd_nwpa_below_2_0_except_0_13, trd_nwpa_2_0_3_0, trd_wpa_0_13,
            trd_wpa_below_2_0_except_0_13, trd_wpa_2_0_3_0, tr327, tr328,
            trd_aluminum_nwpa_2_0, trd_aluminum_nwpa_below_2_0, trd_aluminum_wpa_2_0,
            trd_aluminum_wpa_below_2_0, aluminum_dimension_check_aluminum_terminal_inspection,
            aluminum_visual_inspection, aluminum_coating_uv_ii, aluminum_image_inspection,
            aluminum_uv_iii, trd_alpha_aluminum_nwpa, trd_alpha_aluminum_wpa,
            aluminum_visual_inspection_for_alpha, enlarged_terminal_check_for_alpha,
            air_water_leak_test, sam_sub_no_airbag, sam_sub_no_normal,
            jam_auto_crimping_and_twisting, trd_alpha_aluminum_5_0_above,
            point_marking_nsc, point_marking_sam, enlarged_terminal_check_aluminum,
            nsc_1, nsc_2, nsc_3, nsc_4, nsc_5, nsc_6, nsc_7, nsc_8, nsc_9, nsc_10
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                  ?, ?, ?, ?, ?, ?, ?)";

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
