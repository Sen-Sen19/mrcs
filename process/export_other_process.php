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
    v_type_twisting,
manual_crimping_2tons_to_be_joint_on_sw,
airbag,
a_b_sub_pc,
intermediate_ripping_uas_manual_nf_f,
manual_crimping_4tons_nf_f,
intermediate_ripping_uas_joint,
intermediate_stripping_kb10,
manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22,
joint_taping_11mm_ps_150_ll_2,
joint_taping_12mm_ps_700_l_2_ps_200_m_2,
joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2,
heat_shrink_joint_crimping,
heat_shrink_la_terminal,
manual_crimping_2tons_nsc_weld,
intermediate_stripping_kb10_nsc_weld,
joint_crimping_2tons_ps_017_ss_2_nsc_weld,
joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld,
silicon_injection,
welding_taping_13mm,
heat_shrink_welding,
casting_c385_shieldwire,
quick_stripping_927_auto,
mira_quick_stripping,
quick_stripping_311_manual,
manual_heat_shrink_blower_sumitube,
manual_taping_dispenser_sw,
heat_shrink_joint_crimping_sw,
casting_c373,
casting_c377,
casting_c371,
manual_heat_shrink_blower_battery,
casting_c373_normal,
casting_c371_normal,
manual_2tons_bending,
manual_5tons_battery,
al_looping,
soldering,
waterproof_agent_injection,
thermosetting,
completion,
picking_looping,
welding_end,
intermediate_welding,
sam_set_a_b,
sam_set_normal,
total_circuit,
new_airbag
    FROM other_process";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Set headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Other_Process_' . date("Y-m-d") . '.csv"');

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
    'V TYPE TWISTING',
    'MANUAL CRIMPING 2TONS TO BE JOINT ON SW',
    'AIRBAG',
    'A B SUB PC',
    'INTERMEDIATE RIPPING UAS MANUAL NF F',
    'MANUAL CRIMPING 4TONS NF F',
    'INTERMEDIATE RIPPING UAS JOINT',
    'INTERMEDIATE STRIPPING KB10',
    'MANUAL TAPING DISPENSER 8 0 5 0 8 0 8 0 PS 115 2 CHFUS 0 22 CIVUS 0 22',
    'JOINT TAPING 11MM PS 150 LL 2',
    'JOINT TAPING 12MM PS 700 L 2 PS 200 M 2',
    'JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2',
    'HEAT SHRINK JOINT CRIMPING',
    'HEAT SHRINK LA TERMINAL',
    'MANUAL CRIMPING 2TONS NSC WELD',
    'INTERMEDIATE STRIPPING KB10 NSC WELD',
    'JOINT CRIMPING 2TONS PS 017 SS 2 NSC WELD',
    'JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2 NSC WELD',
    'SILICON INJECTION',
    'WELDING TAPING 13MM',
    'HEAT SHRINK WELDING',
    'CASTING C385 SHIELDWIRE',
    'QUICK STRIPPING 927 AUTO',
    'MIRA QUICK STRIPPING',
    'QUICK STRIPPING 311 MANUAL',
    'MANUAL HEAT SHRINK BLOWER SUMITUBE',
    'MANUAL TAPING DISPENSER SW',
    'HEAT SHRINK JOINT CRIMPING SW',
    'CASTING C373',
    'CASTING C377',
    'CASTING C371',
    'MANUAL HEAT SHRINK BLOWER BATTERY',
    'CASTING C373 NORMAL',
    'CASTING C371 NORMAL',
    'MANUAL 2TONS BENDING',
    'MANUAL 5TONS BATTERY',
    'AL LOOPING',
    'SOLDERING',
    'WATERPROOF AGENT INJECTION',
    'THERMOSETTING',
    'COMPLETION',
    'PICKING LOOPING',
    'WELDING END',
    'INTERMEDIATE WELDING',
    'SAM SET A B',
    'SAM SET NORMAL',
    'TOTAL CIRCUIT',
    'NEW AIRBAG'

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