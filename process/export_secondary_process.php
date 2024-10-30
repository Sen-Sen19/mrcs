<?php
include 'conn.php'; // Include your connection file


$sql = "SELECT 
    product, car_model,base_product,  car_code, block, class, line_no, 
            circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
            joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
            joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
            manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
            joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
            joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm,
            twisting_primary_normal_wires_l_less_than_3000mm, twisting_primary_normal_wires_l_less_than_4500mm,
            twisting_primary_normal_wires_l_less_than_6000mm, twisting_primary_normal_wires_l_less_than_7500mm,
            twisting_primary_normal_wires_l_less_than_9000mm,twisting_secondary_normal_wires_l_less_than_1500mm,
            twisting_secondary_normal_wires_l_less_than_3000mm, twisting_secondary_normal_wires_l_less_than_4500mm,
            twisting_secondary_normal_wires_l_less_than_6000mm, twisting_secondary_normal_wires_l_less_than_7500mm,
            twisting_secondary_normal_wires_l_less_than_9000mm, twisting_primary_aluminum_wires_l_less_than_1500mm,
            twisting_primary_aluminum_wires_l_less_than_3000mm, twisting_primary_aluminum_wires_l_less_than_4500mm,
            twisting_primary_aluminum_wires_l_less_than_6000mm,
            twisting_secondary_aluminum_wires_l_less_than_1500mm,
            twisting_secondary_aluminum_wires_l_less_than_3000mm,
            twisting_secondary_aluminum_wires_l_less_than_4500mm,
            twisting_secondary_aluminum_wires_l_less_than_6000mm,
            twisting_secondary_aluminum_wires_l_less_than_7500mm,
            twisting_secondary_aluminum_wires_l_less_than_9000mm,
            manual_crimping_2tons_normal_single_crimp,
            manual_crimping_2tons_normal_double_crimp,
            manual_crimping_2tons_double_crimp_twisted,
            manual_crimping_2tons_la_terminal,
            manual_crimping_2tons_double_crimp_la_terminal,
            manual_crimping_2tons_w_gomusen,
            manual_crimping_4tons_double_crimp_twisted,
            manual_crimping_4tons_normal_single_crimp,
            manual_crimping_4tons_normal_double_crimp,
            manual_crimping_4tons_la_terminal,
            manual_crimping_4tons_double_crimp_la_terminal,
            manual_crimping_4tons_w_gomusen,
            manual_crimping_5tons,
            intermediate_butt_welding_except_0_13_electrode_1,
            intermediate_butt_welding_except_0_13_electrode_2,
            intermediate_butt_welding_except_0_13_electrode_3,
            intermediate_butt_welding_except_0_13_electrode_4,
            intermediate_butt_welding_except_0_13_electrode_5,
            welding_at_head_except_0_13_electrode_1,
            welding_at_head_except_0_13_electrode_2,
            welding_at_head_except_0_13_electrode_3,
            welding_at_head_except_0_13_electrode_4,
            welding_at_head_except_0_13_electrode_5,
            intermediate_butt_welding_0_13_electrode_1,
            welding_at_head_0_13_electrode_1,
            intermediate_butt_welding_0_13_electrode_2,
            welding_at_head_0_13_electrode_2
    FROM secondary_process";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Set headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Secondary_Process_' . date("Y-m-d") . '.csv"');

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
    'Joint Crimping 2tons PS 800 S 2',
    'Joint Crimping 2tons PS 200 M 2',
    'Joint Crimping 2tons PS 017 SS 2',
    'Joint Crimping 2tons PS 126 SST2',
    'Joint Crimping 4tons PS 700 L 2',
    'Joint Crimping 5tons PS 150 LL',
    'Manual Crimping Shieldwire 2T',
    'Manual Crimping Shieldwire 4T',
    'Joint Crimping 2tons PS 800 S 2 SW',
    'Joint Crimping 2tons PS 126 SST2 SW',
    'Joint Crimping 2tons PS 017 SS 2 SW',
    'Twisting Primary Normal Wires L Less Than 1500mm',
    'Twisting Primary Normal Wires L Less Than 3000mm',
    'Twisting Primary Normal Wires L Less Than 4500mm',
    'Twisting Primary Normal Wires L Less Than 6000mm',
    'Twisting Primary Normal Wires L Less Than 7500mm',
    'Twisting Primary Normal Wires L Less Than 9000mm',
    'Twisting Secondary Normal Wires L Less Than 1500mm',
    'Twisting Secondary Normal Wires L Less Than 3000mm',
    'Twisting Secondary Normal Wires L Less Than 4500mm',
    'Twisting Secondary Normal Wires L Less Than 6000mm',
    'Twisting Secondary Normal Wires L Less Than 7500mm',
    'Twisting Secondary Normal Wires L Less Than 9000mm',
    'Twisting Primary Aluminum Wires L Less Than 1500mm',
    'Twisting Primary Aluminum Wires L Less Than 3000mm',
    'Twisting Primary Aluminum Wires L Less Than 4500mm',
    'Twisting Primary Aluminum Wires L Less Than 6000mm',
    'Twisting Secondary Aluminum Wires L Less Than 1500mm',
    'Twisting Secondary Aluminum Wires L Less Than 3000mm',
    'Twisting Secondary Aluminum Wires L Less Than 4500mm',
    'Twisting Secondary Aluminum Wires L Less Than 6000mm',
    'Twisting Secondary Aluminum Wires L Less Than 7500mm',
    'Twisting Secondary Aluminum Wires L Less Than 9000mm',
    'Manual Crimping 2tons Normal Single Crimp',
    'Manual Crimping 2tons Normal Double Crimp',
    'Manual Crimping 2tons Double Crimp Twisted',
    'Manual Crimping 2tons LA Terminal',
    'Manual Crimping 2tons Double Crimp LA Terminal',
    'Manual Crimping 2tons W Gomusen',
    'Manual Crimping 4tons Double Crimp Twisted',
    'Manual Crimping 4tons Normal Single Crimp',
    'Manual Crimping 4tons Normal Double Crimp',
    'Manual Crimping 4tons LA Terminal',
    'Manual Crimping 4tons Double Crimp LA Terminal',
    'Manual Crimping 4tons W Gomusen',
    'Manual Crimping 5tons',
    'Intermediate Butt Welding Except 0 13 Electrode 1',
    'Intermediate Butt Welding Except 0 13 Electrode 2',
    'Intermediate Butt Welding Except 0 13 Electrode 3',
    'Intermediate Butt Welding Except 0 13 Electrode 4',
    'Intermediate Butt Welding Except 0 13 Electrode 5',
    'Welding At Head Except 0 13 Electrode 1',
    'Welding At Head Except 0 13 Electrode 2',
    'Welding At Head Except 0 13 Electrode 3',
    'Welding At Head Except 0 13 Electrode 4',
    'Welding At Head Except 0 13 Electrode 5',
    'Intermediate Butt Welding 0 13 Electrode 1',
    'Welding At Head 0 13 Electrode 1',
    'Intermediate Butt Welding 0 13 Electrode 2',
    'Welding At Head 0 13 Electrode 2'

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