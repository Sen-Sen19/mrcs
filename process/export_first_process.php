<?php
include 'conn.php'; // Include your connection file

// Prepare the SQL query to fetch all data from the first_process table
$sql = "SELECT 
    product,
    car_model,
    base_product,
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
    FROM first_process";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Set headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="First_Process_' . date("Y-m-d") . '.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Output column headings
fputcsv($output, [
    'Product',
    'Car Model',
    'Base Product',
    'Car Code',
    'Block',
    'Class',
    'Line No',
    'Circuit Qty',
    'TRD NWPA 0 13',
    'TRD NWPA BELOW 2 0 EXCEPT 0 13',
    'TRD NWPA 2 0 3 0',
    'TRD WPA 0 13',
    'TRD WPA BELOW 2 0 EXCEPT 0 13',
    'TRD WPA 2 0 3 0',
    'TR327',
    'TR328',
    'TRD ALUMINUM NWPA 2 0',
    'TRD ALUMINUM NWPA BELOW 2 0',
    'TRD ALUMINUM WPA 2 0',
    'TRD ALUMINUM WPA BELOW 2 0',
    'ALUMINUM DIMENSION CHECK ALUMINUM TERMINAL INSPECTION',
    'ALUMINUM VISUAL INSPECTION',
    'ALUMINUM COATING UV II',
    'ALUMINUM IMAGE INSPECTION',
    'ALUMINUM UV III',
    'TRD ALPHA ALUMINUM NWPA',
    'TRD ALPHA ALUMINUM WPA',
    'ALUMINUM VISUAL INSPECTION FOR ALPHA',
    'ENLARGED TERMINAL CHECK FOR ALPHA',
    'AIR WATER LEAK TEST',
    'SAM SUB NO AIRBAG',
    'SAM SUB NO NORMAL',
    'JAM AUTO CRIMPING AND TWISTING',
    'TRD ALPHA ALUMINUM 5 0 ABOVE',
    'POINT MARKING NSC',
    'POINT MARKING SAM',
    'ENLARGED TERMINAL CHECK ALUMINUM',
    'NSC 1',
    'NSC 2',
    'NSC 3',
    'NSC 4',
    'NSC 5',
    'NSC 6',
    'NSC 7',
    'NSC 8',
    'NSC 9',
    'NSC 10'
]);

// Output data
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Ensure each field is properly formatted and handle null values
    foreach ($row as $key => $value) {
        // Replace null values with an empty string
        if ($value === null) {
            $row[$key] = '';
        }
    }
    
    // Write the formatted row to the CSV
    fputcsv($output, $row);
}

// Close output stream
fclose($output);
exit();
?>
