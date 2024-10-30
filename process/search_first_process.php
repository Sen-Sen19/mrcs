<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

if (isset($_GET['base_product'])) {
    $base_product = $_GET['base_product'];

    $tables = [
        'first_process',
    ];

    $mergedResult = []; 

    foreach ($tables as $table) {
        // Update this line to select only the desired columns
        $sql = "SELECT 
                    base_product,
                    car_model,
                    product,
                    car_code,
                    block,
                    class,
                    line_no,
                    circuit_qty,
                    trd_nwpa_0_13,
                    trd_nwpa_below_2_0_except_0_13,
                    trd_nwpa_2_0_3_0,
                    trd_wpa_0_13,
                    trd_wpa_below_2_0_except_0_13,
                    trd_wpa_2_0_3_0,
                    tr327,
                    tr328,
                    trd_aluminum_nwpa_2_0,
                    trd_aluminum_nwpa_below_2_0,
                    trd_aluminum_wpa_2_0,
                    trd_aluminum_wpa_below_2_0,
                    aluminum_dimension_check_aluminum_terminal_inspection,
                    aluminum_visual_inspection,
                    aluminum_coating_uv_ii,
                    aluminum_image_inspection,
                    aluminum_uv_iii,
                    trd_alpha_aluminum_nwpa,
                    trd_alpha_aluminum_wpa,
                    aluminum_visual_inspection_for_alpha,
                    enlarged_terminal_check_for_alpha,
                    air_water_leak_test,
                    sam_sub_no_airbag,
                    sam_sub_no_normal,
                    jam_auto_crimping_and_twisting,
                    trd_alpha_aluminum_5_0_above,
                    point_marking_nsc,
                    point_marking_sam,
                    enlarged_terminal_check_aluminum,
                    nsc_1,
                    nsc_2,
                    nsc_3,
                    nsc_4,
                    nsc_5,
                    nsc_6,
                    nsc_7,
                    nsc_8,
                    nsc_9,
                    nsc_10
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
