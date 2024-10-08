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
        $product = isset($row[0]) ? trim($row[0]) : '';
        $car_model = isset($row[1]) ? trim($row[1], '"') : ''; // Trim quotes
        $base_product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4], '"') : ''; // Trim quotes
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        $trd_nwpa_0_13 = isset($row[8]) ? trim($row[8]) : '';
        $trd_nwpa_below_2_0_except_0_13 = isset($row[9]) ? trim($row[9]) : '';
        $trd_nwpa_2_0_3_0 = isset($row[10]) ? trim($row[10]) : '';
        $trd_wpa_0_13 = isset($row[11]) ? trim($row[11]) : '';
        $trd_wpa_below_2_0_except_0_13 = isset($row[12]) ? trim($row[12]) : '';
        $trd_wpa_2_0_3_0 = isset($row[13]) ? trim($row[13]) : '';
        $tr327 = isset($row[14]) ? trim($row[14]) : '';
        $tr328 = isset($row[15]) ? trim($row[15]) : '';
        $trd_aluminum_nwpa_2_0 = isset($row[16]) ? trim($row[16]) : '';
        $trd_aluminum_nwpa_below_2_0 = isset($row[17]) ? trim($row[17]) : '';
        $trd_aluminum_wpa_2_0 = isset($row[18]) ? trim($row[18]) : '';
        $trd_aluminum_wpa_below_2_0 = isset($row[19]) ? trim($row[19]) : '';
        $aluminum_dimension_check_aluminum_terminal_inspection = isset($row[20]) ? trim($row[20]) : '';
        $aluminum_visual_inspection = isset($row[21]) ? trim($row[21]) : '';
        $aluminum_coating_uv_ii = isset($row[22]) ? trim($row[22]) : '';
        $aluminum_image_inspection = isset($row[23]) ? trim($row[23]) : '';
        $aluminum_uv_iii = isset($row[24]) ? trim($row[24]) : '';
        $trd_alpha_aluminum_nwpa = isset($row[25]) ? trim($row[25]) : '';
        $trd_alpha_aluminum_wpa = isset($row[26]) ? trim($row[26]) : '';
        $aluminum_visual_inspection_for_alpha = isset($row[27]) ? trim($row[27]) : '';
        $enlarged_terminal_check_for_alpha = isset($row[28]) ? trim($row[28]) : '';
        $air_water_leak_test = isset($row[29]) ? trim($row[29]) : '';
        $sam_sub_no_airbag = isset($row[30]) ? trim($row[30]) : '';
        $sam_sub_no_normal = isset($row[31]) ? trim($row[31]) : '';
        $jam_auto_crimping_and_twisting = isset($row[32]) ? trim($row[32]) : '';
        $trd_alpha_aluminum_5_0_above = isset($row[33]) ? trim($row[33]) : '';
        $point_marking_nsc = isset($row[34]) ? trim($row[34]) : '';
        $point_marking_sam = isset($row[35]) ? trim($row[35]) : '';
        $enlarged_terminal_check_aluminum = isset($row[36]) ? trim($row[36]) : '';
        $nsc_1 = isset($row[37]) ? trim($row[37]) : '';
        $nsc_2 = isset($row[38]) ? trim($row[38]) : '';
        $nsc_3 = isset($row[39]) ? trim($row[39]) : '';
        $nsc_4 = isset($row[40]) ? trim($row[40]) : '';
        $nsc_5 = isset($row[41]) ? trim($row[41]) : '';
        $nsc_6 = isset($row[42]) ? trim($row[42]) : '';
        $nsc_7 = isset($row[43]) ? trim($row[43]) : '';
        $nsc_8 = isset($row[44]) ? trim($row[44]) : '';
        $nsc_9 = isset($row[45]) ? trim($row[45]) : '';
        $nsc_10 = isset($row[46]) ? trim($row[46]) : '';

        $sql = "
        MERGE first_process AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?, ?, ?))
        AS source (
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
nsc_10)

  ON target.car_model = source.car_model 
           AND target.product = source.product 
           AND target.car_code = source.car_code 
           AND target.block = source.block 
           AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
 target.base_product = source.base_product,
target.car_model = source.car_model,
target.product = source.product,
target.car_code = source.car_code,
target.block = source.block,
target.class = source.class,
target.line_no = source.line_no,
target.circuit_qty = source.circuit_qty,
target.trd_nwpa_0_13 = source.trd_nwpa_0_13,
target.trd_nwpa_below_2_0_except_0_13 = source.trd_nwpa_below_2_0_except_0_13,
target.trd_nwpa_2_0_3_0 = source.trd_nwpa_2_0_3_0,
target.trd_wpa_0_13 = source.trd_wpa_0_13,
target.trd_wpa_below_2_0_except_0_13 = source.trd_wpa_below_2_0_except_0_13,
target.trd_wpa_2_0_3_0 = source.trd_wpa_2_0_3_0,
target.tr327 = source.tr327,
target.tr328 = source.tr328,
target.trd_aluminum_nwpa_2_0 = source.trd_aluminum_nwpa_2_0,
target.trd_aluminum_nwpa_below_2_0 = source.trd_aluminum_nwpa_below_2_0,
target.trd_aluminum_wpa_2_0 = source.trd_aluminum_wpa_2_0,
target.trd_aluminum_wpa_below_2_0 = source.trd_aluminum_wpa_below_2_0,
target.aluminum_dimension_check_aluminum_terminal_inspection = source.aluminum_dimension_check_aluminum_terminal_inspection,
target.aluminum_visual_inspection = source.aluminum_visual_inspection,
target.aluminum_coating_uv_ii = source.aluminum_coating_uv_ii,
target.aluminum_image_inspection = source.aluminum_image_inspection,
target.aluminum_uv_iii = source.aluminum_uv_iii,
target.trd_alpha_aluminum_nwpa = source.trd_alpha_aluminum_nwpa,
target.trd_alpha_aluminum_wpa = source.trd_alpha_aluminum_wpa,
target.aluminum_visual_inspection_for_alpha = source.aluminum_visual_inspection_for_alpha,
target.enlarged_terminal_check_for_alpha = source.enlarged_terminal_check_for_alpha,
target.air_water_leak_test = source.air_water_leak_test,
target.sam_sub_no_airbag = source.sam_sub_no_airbag,
target.sam_sub_no_normal = source.sam_sub_no_normal,
target.jam_auto_crimping_and_twisting = source.jam_auto_crimping_and_twisting,
target.trd_alpha_aluminum_5_0_above = source.trd_alpha_aluminum_5_0_above,
target.point_marking_nsc = source.point_marking_nsc,
target.point_marking_sam = source.point_marking_sam,
target.enlarged_terminal_check_aluminum = source.enlarged_terminal_check_aluminum,
target.nsc_1 = source.nsc_1,
target.nsc_2 = source.nsc_2,
target.nsc_3 = source.nsc_3,
target.nsc_4 = source.nsc_4,
target.nsc_5 = source.nsc_5,
target.nsc_6 = source.nsc_6,
target.nsc_7 = source.nsc_7,
target.nsc_8 = source.nsc_8,
target.nsc_9 = source.nsc_9,
target.nsc_10 = source.nsc_10

WHEN NOT MATCHED THEN
INSERT (
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
nsc_10)
VALUES (
source.base_product,
source.car_model,
source.product,
source.car_code,
source.block,
source.class,
source.line_no,
source.circuit_qty,
source.trd_nwpa_0_13,
source.trd_nwpa_below_2_0_except_0_13,
source.trd_nwpa_2_0_3_0,
source.trd_wpa_0_13,
source.trd_wpa_below_2_0_except_0_13,
source.trd_wpa_2_0_3_0,
source.tr327,
source.tr328,
source.trd_aluminum_nwpa_2_0,
source.trd_aluminum_nwpa_below_2_0,
source.trd_aluminum_wpa_2_0,
source.trd_aluminum_wpa_below_2_0,
source.aluminum_dimension_check_aluminum_terminal_inspection,
source.aluminum_visual_inspection,
source.aluminum_coating_uv_ii,
source.aluminum_image_inspection,
source.aluminum_uv_iii,
source.trd_alpha_aluminum_nwpa,
source.trd_alpha_aluminum_wpa,
source.aluminum_visual_inspection_for_alpha,
source.enlarged_terminal_check_for_alpha,
source.air_water_leak_test,
source.sam_sub_no_airbag,
source.sam_sub_no_normal,
source.jam_auto_crimping_and_twisting,
source.trd_alpha_aluminum_5_0_above,
source.point_marking_nsc,
source.point_marking_sam,
source.enlarged_terminal_check_aluminum,
source.nsc_1,
source.nsc_2,
source.nsc_3,
source.nsc_4,
source.nsc_5,
source.nsc_6,
source.nsc_7,
source.nsc_8,
source.nsc_9,
source.nsc_10
);  ";
        $params = [
            $base_product,
            $car_model,
            $product,
            $car_code,
            $block,
            $class,
            $line_no,
            $circuit_qty,
            $trd_nwpa_0_13,
            $trd_nwpa_below_2_0_except_0_13,
            $trd_nwpa_2_0_3_0,
            $trd_wpa_0_13,
            $trd_wpa_below_2_0_except_0_13,
            $trd_wpa_2_0_3_0,
            $tr327,
            $tr328,
            $trd_aluminum_nwpa_2_0,
            $trd_aluminum_nwpa_below_2_0,
            $trd_aluminum_wpa_2_0,
            $trd_aluminum_wpa_below_2_0,
            $aluminum_dimension_check_aluminum_terminal_inspection,
            $aluminum_visual_inspection,
            $aluminum_coating_uv_ii,
            $aluminum_image_inspection,
            $aluminum_uv_iii,
            $trd_alpha_aluminum_nwpa,
            $trd_alpha_aluminum_wpa,
            $aluminum_visual_inspection_for_alpha,
            $enlarged_terminal_check_for_alpha,
            $air_water_leak_test,
            $sam_sub_no_airbag,
            $sam_sub_no_normal,
            $jam_auto_crimping_and_twisting,
            $trd_alpha_aluminum_5_0_above,
            $point_marking_nsc,
            $point_marking_sam,
            $enlarged_terminal_check_aluminum,
            $nsc_1,
            $nsc_2,
            $nsc_3,
            $nsc_4,
            $nsc_5,
            $nsc_6,
            $nsc_7,
            $nsc_8,
            $nsc_9,
            $nsc_10

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